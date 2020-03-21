<?php


namespace Drupal\login_blocks\Plugin\Block;

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
class LoginFormBlock extends BlockBase {

  
 /* protected function blockAccess(AccountInterface $account) {
    if (!$account->isAnonymous()) {
      return AccessResult::allowed();
    }
    return AccessResult::forbidden();
  }
  */
  
  public function build() {
    $form = \Drupal::formBuilder()->getForm('Drupal\login_blocks\Form\BlockFormLogin');
    return array(
      'block_contribute_form' => $form,
    );
 
  }
  

}
 