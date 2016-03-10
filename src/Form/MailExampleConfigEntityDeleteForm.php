<?php
/**
 * @file
 * Contains Drupal\mail_example\Form\MailExampleConfigEntityDeleteForm.
 */

namespace Drupal\mail_example\Form;

use Drupal\Core\Entity\EntityConfirmFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;

class MailExampleConfigEntityDeleteForm extends EntityConfirmFormBase {

  /**
   * Returns the question to ask the user.
   *
   * @return string
   *   The form question. The page title will be set to this value.
   */
  public function getQuestion() {
    return $this->t('You sure you want to delete @name', ['@name' => $this->entity->id()]);
  }

  /**
   * Returns the route to go to if the user cancels the action.
   *
   * @return \Drupal\Core\Url
   *   A URL object.
   */
  public function getCancelUrl() {
    return new Url('mail_example.entity.list');
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->entity->delete();
    drupal_set_message($this->t('Deleted @name', ['@name' => $this->entity->id()]));
    $form_state->setRedirect('mail_example.entity.list');
  }

}
