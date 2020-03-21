<?php

//https://www.drupal.org/docs/8/api/form-api/introduction-to-form-api

namespace Drupal\example\Form;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Database\Database;
use Symfony\Component\HttpFoundation\RedirectResponse;

class AddForm extends FormBase{
	  public function getFormId()
	 {
		return 'add_form';
     }
	   public function buildForm(array $form, FormStateInterface $form_state) 
	{
	
   if( $this->check_user_access() )
		{		
	  $form['name']= array(
	'#type' => 'textfield',
	'#title' => $this->t('Your login name: '),
	'#size' => 60,
    '#maxlength' => 128,
	'#required'  => TRUE, 
	//'#default_value' => (isset($record['Fname']) && $_GET['num']) ? $record['Fname']:'',
	);
	
  	$form['fname']= array(
	'#type' => 'textfield',
	'#title' => $this->t('Your first name: '),
	//'#default_value' => (isset($record['Phone_number']) && $_GET['num']) ? $record['Phone_number']:'',
	);
	
		$form['lname']= array(
	'#type' => 'textfield',
	'#title' => $this->t('Your last name: '),
	//'#default_value' => (isset($record['Phone_number']) && $_GET['num']) ? $record['Phone_number']:'',
	);
	
	 $form['pass']= array(
	'#type' => 'password',
	'#title' => $this->t('Password:'),
	'#size' => 60,
    '#maxlength' => 128,
	'#required'  => TRUE, 
	//'#default_value' => (isset($record['Fname']) && $_GET['num']) ? $record['Fname']:'',
	);
		
	$form['email']= array(
	'#type' => 'email',
	'#title' => $this->t('Your email: '),
	//'#default_value' => (isset($record['Email']) && $_GET['num']) ? $record['Email']:'',
	);
	
		$form['position']= array(
	'#type' => 'textfield',
	'#title' => $this->t('Your position: '),
	//'#default_value' => (isset($record['Phone_number']) && $_GET['num']) ? $record['Phone_number']:'',
	);
	
	$form['active'] = array(
  '#type' => 'checkbox',
  '#title' => $this->t('Active'),
	);
	
	 $form['submit'] = array(
        '#type' => 'submit',
        '#value' => 'save',     
    );
	
	}
		else
	{
		  //$current_role = \Drupal::currentUser()->getRoles();
		//	drupal_set_message($current_role[1]);
			// $response = new RedirectResponse("/mydata/hello/table");
			drupal_set_message("Access deny");
	}
	
		return $form ;
	}
	 public function validateForm(array &$form, FormStateInterface $form_state) 
	{
		if(is_numeric($form_state->getValue('fname')))
		{
			$form_state->setErrorByName('fname',$this->t('Error!!! The fist name must be a string'));
		}
		
	//	if( strlen($form_state->getValue('phone_number'))<10 )
	//	{
	//	$form_state->setErrorByName('phone_number',$this->t('Phone number must be at least 10 digits'));
	//	}
	  parent::validateForm($form,$form_state);
	}
	
	public function check_user_access()
	{
		//$roles = [
		//	'view',
		//	'administrator',
		//			];
					
		$current_role = \Drupal::currentUser()->getRoles();
	//	foreach($roles as $role) {
			if($current_role[1] == 'administrator' || $current_role[1] == 'modifier') {
				return TRUE;
			}
	//	}

		return FALSE;			
 
	}
	
	public function submitForm(array &$form, FormStateInterface $form_state) 
   {

   $lang = \Drupal::languageManager()->getCurrentLanguage()->getId();
    $user = \Drupal\user\Entity\User::create();
   // $user = \Drupal\user\Entity\User::load(\Drupal::currentUser()->id());
    $email = $form_state->getValue('email');
	$fname = $form_state->getValue('fname');
	$lname = $form_state->getValue('lname');
	$position = $form_state->getValue('position');
	$status   = $form_state->getValue('active');
	
// Optional line:  Do this if you want to pick the user's ID !!!
//    $user->uid = $old_user_account_from_your_other_system['uid'];  // Or 42, etc - or just omit it and let it be auto-assigned if you don't care
 
// The Basics
	$user->setUsername($form_state->getValue('name')); 
//	$user->setUsername($form_state->getValue('fname')); 
//    $user->setUsername($form_state->getValue('lname'));  // You could also just set this to "Bob" or something... 
    $user->setPassword($form_state->getValue('pass')); 
//	$user->setFirstname($fname);
    $user->setEmail($email);  
    $user->enforceIsNew();  // Set this to FALSE if you want to edit (resave) an existing user object
    
	 
// Optional settings  <-- Thanks to http://drupal8.ovh/ for these suggestions!
   $user->set("init",$email);
  // $user->set("first_name",$fname);
//	$user->set("last_name",$lname);
//	$user->set("position",$position);
   $user->set("langcode", $lang);
   $user->set("preferred_langcode", $lang);
   $user->set("preferred_admin_langcode", $lang);
    
 //   $user->activate();  // kich thoat status
 
// Save user
   $result = $user->save();
	  $uid= $user->get('uid')->value;
	  $field = array(
			'first_name' => $fname,
			'last_name' => $lname,
			'position'  => $position,
			'status'    => $status,
		   );	   
		   $query = \Drupal::database();
		   $query->update('users_field_data')
				->fields($field)
			    ->condition('uid',$uid)
			   ->execute();			
		drupal_set_message("Registration successful. You are now logged in");
		  $response = new RedirectResponse("/mydata/hello/table");
            $response->send();
		  
		  
		  
		  
			  
   }
}	 
	 