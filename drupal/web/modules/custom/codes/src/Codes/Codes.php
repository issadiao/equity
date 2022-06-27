<?php
/**
 * @file
 * Contains \Drupal\codes\Codes.
 */

namespace Drupal\codes\Codes;

use Drupal\node\Entity\Node;
use Drupal\user\Entity\User;



/**
 * Class for managing Codes.
 */
class Codes {

  public function generate(): string {
    $string = microtime() . rand(1000,100000) . $this->random_str();
    return md5($string);
  }

  /*
   * saves an inital code that can be redeemed for an activated code
   */
  public function save($company, $email, $limit) {
    $hash = $this->generate();
    $node = Node::create(['type' => 'code']);
    $node->set('title', $hash);
    $node->set('uid', 1);
    $node->set('field_parent_company', $company);
    $node->set('field_withdrawal_limit', $limit);
    $node->set('field_employee_email', $email);
    // Save the node.
    $node->save();
    return $hash;
  }

  public function activate($hash, $email) {
    $nids = \Drupal::entityQuery('node')->condition('title', $hash)->execute();
    foreach ($nids as $nid) {
      if ($node = Node::load($nid)) {
        if ($node->field_employee_email->value == $email && $node->field_status->value == 'open') {
          return $this->createActivatedCode($node);
        }
      }
    }
    return FALSE;
  }

  /*
   * a "code" node is used to generate an "active code" node
   */
  public function createActivatedCode($node): string {
    $hash = $this->generate();
    $active_node = Node::create(['type' => 'active_code']);
    $active_node->set('title', $hash);
    $active_node->set('uid', 1);
    $active_node->set('field_parent_company', $node->field_parent_company->target_id);
    $active_node->set('field_withdrawal_limit', $node->field_withdrawal_limit->value);
    $active_node->set('field_expiration', $node->field_expiration->value);
    // Save the node.
    $active_node->save();
    $node->set('field_status', 'closed');
    $node->save();
    return $hash;
  }

  public function random_str(int $length = 64, string $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'): string {
    $pieces = [];
    $max = mb_strlen($keyspace, '8bit') - 1;
    for ($i = 0; $i < $length; ++$i) {
      $pieces []= $keyspace[random_int(0, $max)];
    }
    return implode('', $pieces);
  }

}
