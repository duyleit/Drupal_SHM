<?php

namespace Drupal\login_name\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Component\Utility\UrlHelper;


class BlockFormLogin extends FormBase {
 
  public function getFormId() {
	return 'block_login_form';
  }


  public function buildForm(array $form, FormStateInterface $form_state) {
 
	
	 $form['employee_name'] = array(
      '#type' => 'textfield',
      '#title' => t('Employee Name:'),
      '#required' => TRUE,
    );
    
    return $form;
  }

  
  public function validateForm(array &$form, FormStateInterface $form_state) {

  }

  
  public function submitForm(array &$form, FormStateInterface $form_state) {
	
  }
}
?>