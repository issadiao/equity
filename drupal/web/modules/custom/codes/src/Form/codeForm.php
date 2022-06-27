<?php

namespace Drupal\codes\Form;

use Drupal\codes\Codes\Codes;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\user\Entity\User;
use Drupal\companies\Companies\Companies;
use Drupal\users\Users\Users;

/**
 * Implements an example form.
 */
class codeForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'code_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $user = new Users();
    $users_company = $user->company();
    $company = new Companies($users_company);
    $limit = $company->limit();

    $form['amount'] = [
      '#type' => 'number',
      '#step' => '.01',
      '#title' => $this->t('Amount'),
      '#description' => $this->t('Enter an amount below $' . number_format($limit / 100 ,2)),
      '#required' => TRUE,
    ];
    $form['email'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Employee Email'),
      '#description' => $this->t('Enter employee email addresses. One per line.'),
    ];
    $form['actions']['#type'] = 'actions';
    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Send Invitations'),
      '#button_type' => 'primary',
    ];
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    $user = new Users();
    $users_company = $user->company();
    $company = new Companies($users_company);
    $limit = $company->limit();
    if ($form_state->getValue('amount') >  $limit / 100) {
      $form_state->setErrorByName('amount', $this->t('Please enter an amount less than $') . number_format($limit / 100 ,2) );
    }
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $user = new Users();
    $users_company = $user->company();
    $company = new Companies($users_company);
    $emails = $form_state->getValue('email');
    $email_list = explode("\n", $emails);
    $company_limit = $company->limit();
    $limit = $form_state->getValue('amount') * 100;
    if ($limit > $company_limit) {
      $limit = $company_limit;
    }
    $count = 0;
    $output = [];
    foreach ($email_list as $email) {
      $code = new Codes();
      $hash = $code->save($company->nid, $email, $limit);
      $output[] = "$email - $hash";
      $count++;
    }
    $text = '1 invitation sent. ';
    if ($count > 1) {
      $text = $count . ' invitations sent. ';
    }
    $this->messenger()->addStatus($this->t($text) . implode(' -- ', $output));
  }

}
