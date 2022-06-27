<?php

namespace Drupal\codes\Form;

use Drupal\codes\Codes\Codes;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\user\Entity\User;
use Drupal\companies\Companies\Companies;
use Drupal\users\Users\Users;

/**
 * Implements a form.
 */
class activateCodeForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'activateCode_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $form['email'] = [
      '#type' => 'email',
      '#title' => $this->t('Your company email'),
      '#required' => TRUE,
    ];
    $form['code'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Your code'),
      '#required' => TRUE,
    ];
    $form['actions']['#type'] = 'actions';
    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Activate Code'),
      '#button_type' => 'primary',
    ];
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {

  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $email = $form_state->getValue('email');
    $code = $form_state->getValue('code');
    $codes = new Codes();
    if ($output = $codes->activate($code, $email)) {
      $text = 'Your one-time code is ' . $output;
      $this->messenger()->addStatus($this->t($text));
    }
    else {
      $this->messenger()->addStatus($this->t('This email and code combination is not valid'));
    }
  }

}
