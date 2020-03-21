<?
namespace Drupal\module_blocks\Plugin\Block;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Block\BlockBase;


class MyFormBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
 /* protected function blockAccess(AccountInterface $account) {
    if (!$account->isAnonymous()) {
      return AccessResult::allowed();
    }
    return AccessResult::forbidden();
  }
  */
  
  public function build() {
    $form = \Drupal::formBuilder()->getForm('Drupal\module_blocks\Form\BlockFormNew');
    return array(
      'block_form_new' => $form,
    );
 //return $form ;
  }
  

}