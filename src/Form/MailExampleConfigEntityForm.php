<?php
namespace Drupal\mail_example\Form;

use Drupal\Core\Entity\EntityForm;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Form\FormStateInterface;

class MailExampleConfigEntityForm extends EntityForm {
  /**
   * {@inheritdoc}
   */
  public function form(array $form, FormStateInterface $form_state) {
    // Call the parent buildForm method.
    $form = parent::form($form, $form_state);

    // Store a reference to the entity.
    $entity = $this->entity;

    // An entity is being edited.
    if (!$entity->isNew()) {
      // Change the form title if it's an edit.
      $form['#title'] = $this->t('Editing configuration entity: @name', ['@name' => $entity->label()]);
    }

    // Build out the rest of the form like you normally would, providing an element for each property.

    // Machine name for ID purposes.
    $form['id']      = [
      '#type'          => 'machine_name',
      '#maxlength'     => EntityTypeInterface::BUNDLE_MAX_LENGTH,
      '#default_value' => $entity->id(),
      '#disabled'      => !$entity->isNew(),
      '#machine_name'  => [
        // We use exist property to validate that the machine name doesn't already exist.
        'exists' => [
          '\Drupal\mail_example\Entity\MailExampleConfigEntity',
          'load'
        ],
      ],
    ];
    $form['subject'] = [
      '#title'         => $this->t('Subject'),
      '#type'          => 'textfield',
      '#default_value' => $entity->label(),
    ];

    $form['message'] = [
      '#title'         => $this->t('Message'),
      '#type'          => 'textarea',
      '#default_value' => $entity->get('message'),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $entity = $this->entity;
    $status = $entity->save();
    if ($status) {
      drupal_set_message($this->t('The @name config was saved', ['@name' => $entity->id()]));
    }
    else {
      drupal_set_message($this->t('The @name config was NOT saved', ['@name' => $entity->id()]));
    }
    // Redirect the user back to list.
    $form_state->setRedirect('mail_example.entity.list');
  }

}
