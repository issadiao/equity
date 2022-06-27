<?php
/**
 * @file
 * Contains \Drupal\users\Users.
 */

namespace Drupal\Users\Users;

use Drupal\node\Entity\Node;
use Drupal\user\Entity\User;



/**
 * Class for managing Users.
 */
class Users {

  public $uid;
  public $user;

  public function __construct($uid = NULL) {
    $this->uid = $uid ?? \Drupal::currentUser()->id();
    $this->user = User::load($this->uid);
  }

  public function company() {
    return $this->user->field_users_company->target_id;
  }

}
