<?php
/**
* @file
* Contains \Drupal\mail_example\Entity\MailExampleConfigEntity.
*/

namespace Drupal\mail_example\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBase;
use Drupal\mail_example\Entity\MailExampleConfigEntityInterface;

/**
 * Defines a MailExampleConfig configuration entity class.
 *
 * @ConfigEntityType(
 *   id = "mail_example",
 *   label = @Translation("Mail Example Config Entity"),
 *   fieldable = FALSE,
 *   handlers = {
 *     "list_builder" = "Drupal\mail_example\MailExampleConfigEntityListBuilder",
 *     "form" = {
 *       "add" = "Drupal\mail_example\Form\MailExampleConfigEntityForm",
 *       "edit" = "Drupal\mail_example\Form\MailExampleConfigEntityForm",
 *       "delete" = "Drupal\mail_example\Form\MailExampleConfigEntityDeleteForm"
 *     }
 *   },
 *   config_prefix = "mail_example",
 *   admin_permission = "administer site configuration",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "subject"
 *   },
 *   links = {
 *     "edit-form" = "/admin/structure/mail_examples/edit/{mail_example}",
 *     "delete-form" = "/admin/structure/mail_examples/delete/{mail_example}"
 *   }
 * )
 */
class MailExampleConfigEntity extends ConfigEntityBase implements MailExampleConfigEntityInterface {
  public $subject;
  public $message;
}