<?php


namespace Drupal\custom_blocks\Plugin\Block;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Block\BlockBase;


/**
 * Provides a 'Block Forms' block.
 *
 * @Block(
 *   id = "block_forms_block",
 *   admin_label = @Translation("Block Forms"),
 *   category = @Translation("Forms")
 * )
 */
class HelloFormBlockk extends BlockBase {

  
 /* protected function blockAccess(AccountInterface $account) {
    if (!$account->isAnonymous()) {
      return AccessResult::allowed();
    }
    return AccessResult::forbidden();
  }
  */
  
  public function build() {
    $form = \Drupal::formBuilder()->getForm('Drupal\custom_blocks\Form\BlockTestFormm');
    return array(
      'block_test_formm' => $form,
    );
 // return  $form;
  }
  

}
 