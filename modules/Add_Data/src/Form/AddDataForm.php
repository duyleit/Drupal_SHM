<?php

//https://www.drupal.org/docs/8/api/form-api/introduction-to-form-api

namespace Drupal\Add_Data\Form;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Database\Database;
use Symfony\Component\HttpFoundation\RedirectResponse;

class AddDataForm extends FormBase{
	  public function getFormId()
	 {
		return 'add_data_form';
     }
	   public function buildForm(array $form, FormStateInterface $form_state) 
	{
		
		if( $this->check_user_access() != FALSE)
		{	
	  $form['fname']= array(
	'#type' => 'textfield',
	'#title' => $this->t('Username:'),
	'#size' => 60,
    '#maxlength' => 128,
	'#required'  => TRUE, 
	//'#default_value' => (isset($record['Fname']) && $_GET['num']) ? $record['Fname']:'',
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
	'#title' => $this->t('Your email '),
	//'#default_value' => (isset($record['Email']) && $_GET['num']) ? $record['Email']:'',
	);
	
/*		$form['status']= array(
	'#type' => 'number',
	'#title' => $this->t('Your status:'),
	//'#default_value' => (isset($record['Phone_number']) && $_GET['num']) ? $record['Phone_number']:'',
	);
	
	 $form['init']= array(
	'#type' => 'textfield',
	'#title' => $this->t('Your init:'),
	//'#size' => 60,
    //'#maxlength' => 128,
	//'#required'  => TRUE, 
	//'#default_value' => (isset($record['Fname']) && $_GET['num']) ? $record['Fname']:'',
	);
	*/
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
	
	public function check_user_access()
	{
		$roles = [
			'view_',
			'administrator',
					];
					
		$current_role = \Drupal::currentUser()->getRoles();
		foreach($roles as $role) {
			if($role == $current_role[1]) {
				return TRUE;
			}
		}

		return FALSE;			
 
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
	public function submitForm(array &$form, FormStateInterface $form_state) 
   {
	  // $dk = db_insert('test_example')
	/* $dk = db_insert('users_field_data')
          ->fields(array(
	            'name' => $form_state->getValue('fname'), // this could also just be the email address if you are not collecting a name
				'pass' => $form_state->getValue('pass'), // hardcoded password - same for every user
				'mail' => $form_state->getValue('email'),
				'status' => $form_state->getValue('status'),
				'init' =          > $form_state->getValue('init'),
		))
		->execute();
		*/
    $lang = \Drupal::languageManager()->getCurrentLanguage()->getId();
    $user = \Drupal\user\Entity\User::create();
    $email = $form_state->getValue('email');
// Optional line:  Do this if you want to pick the user's ID !!!
//    $user->uid = $old_user_account_from_your_other_system['uid'];  // Or 42, etc - or just omit it and let it be auto-assigned if you don't care
 
// The Basics
    $user->setUsername($form_state->getValue('fname'));  // You could also just set this to "Bob" or something... 
    $user->setPassword($form_state->getValue('pass'));  //$user->setPassword($form_state->getValue('pass'));
    $user->setEmail($email);  //$user->setEmail($form_state->getValue('mail'));
    $user->enforceIsNew();  // Set this to FALSE if you want to edit (resave) an existing user object
 
// Optional settings  <-- Thanks to http://drupal8.ovh/ for these suggestions!
    $user->set("init",$email);
    $user->set("langcode", $lang);
    $user->set("preferred_langcode", $lang);
    $user->set("preferred_admin_langcode", $lang);
    //$user->set("setting_name", 'setting_value');
    $user->activate();
 
// Save user
    $result = $user->save();
		
	
			drupal_set_message("Registration successful. You are now logged in");
		  $response = new RedirectResponse("/mydata/hello/table");
            $response->send();
			  
   }
}	 
	 