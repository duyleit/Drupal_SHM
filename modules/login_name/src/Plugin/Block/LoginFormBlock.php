<?php


namespace Drupal\login_name\Plugin\Block;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Block\BlockBase;



class HelloFormBlock extends BlockBase {

  
 
  
  public function build() {
    $form = \Drupal::formBuilder()->getForm('Drupal\login_name\Form\BlockForm');
    return array(
     'block_login_form' => $form,
   );
  
  }
  

}
 