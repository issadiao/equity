<?php
/**
 * @file
 * Contains \Drupal\companies\Companies.
 */

namespace Drupal\Companies\Companies;

use Drupal\node\Entity\Node;
use Drupal\user\Entity\User;



/**
 * Class for managing Companies.
 */
class Companies {

  public $nid;
  public $node;

  public function __construct($nid) {
    $this->nid = $nid;
    $this->node = Node::load($nid);
  }

  public function id() {
    return $this->nid;
  }

  public function name() {
    return $this->node->title->value;
  }

  public function limit() {
    return $this->node->field_withdrawal_limit->value;
  }

}
