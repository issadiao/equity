<?php
namespace Drupal\codes\Controller;

use Drupal\Core\Controller\ControllerBase;

class CodesController extends ControllerBase {

  public function generateCodes() {
    \Drupal::service('page_cache_kill_switch')->trigger();
    return array(
      '#type'   => 'markup',
      '#title' => 'Invite employees',
      '#markup' => '<p>Everyone below will receive a unique access code via email enabling them to make a one-time withdrawal of funds up to the limit set.</p>',
      '#cache'  => [ 'max-age' => 0, ],
      'form'    => \Drupal::formBuilder()->getForm('Drupal\codes\Form\codeForm')
    );
  }

  public function activateCode() {
    \Drupal::service('page_cache_kill_switch')->trigger();
    return array(
      '#type'   => 'markup',
      '#title' => 'Activate your code',
      '#markup' => '<p>Enter your company email address and the code you received below. This will generate an anonymous one-time code, good for one year from when you first received this email, that you can use to withdraw funds if necessary.</p>',
      '#cache'  => [ 'max-age' => 0, ],
      'form'    => \Drupal::formBuilder()->getForm('Drupal\codes\Form\activateCodeForm')
    );
  }

}
