<?php
/**
 * @file
 *
 * Contains Drupal\mail_example\MailExampleConfigEntityListBuilder
 */

namespace Drupal\mail_example;

use Drupal\Core\Config\Entity\ConfigEntityListBuilder;
use Drupal\Core\Entity\EntityInterface;


class MailExampleConfigEntityListBuilder extends ConfigEntityListBuilder {

  /**
   * {@inheritdoc}
   */
  public function buildHeader() {
    // You can add headers for any of the fields you'd like displayed.
    $header['label'] = $this->t('Subject');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    // Each row key will correspond to each header key.
    $row['label'] = $entity->label();
    return $row + parent::buildRow($entity);
  }

  /**
   * {@inheritdoc}
   */
  public function render() {

    $build = parent::render();
    // Add output for an empty list.
    $build['#empty'] = $this->t('There are no mail_example configuration available.');
    return $build;
  }

}