<?php
/**
 * @file
 * Contains \Drupal\article\Plugin\Block\ArticleBlock.
 */
namespace Drupal\resume\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormInterface;
use Drupal\Core\Session\AccountInterface;

/**
 * Provides a 'article' block.
 *
 * @Block(
 *   id = "article_block",
 *   admin_label = @Translation("Article block"),
 *   category = @Translation("Custom article block example")
 * )
 */
class ArticleBlock extends BlockBase {
  /**
   * {@inheritdoc}
   */
  //public function build() {
 //   $form = \Drupal::formBuilder()->getForm('Drupal\resume\Form\WorkForm');
 //   return $form;
 //  }
 
 
 // public function build() {
 //   return array(
  //    '#markup' => $this->t('Hello, World!'),
  //  );
 // }
 
  public function build() {
    $form = \Drupal::formBuilder()->getForm('Drupal\resume\Form\WorkForm');
     return array(
      'resume_form' => $form,
    );
  }
 
}