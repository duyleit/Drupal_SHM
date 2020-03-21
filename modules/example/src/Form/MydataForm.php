<?php
//https://www.drupal.org/docs/8/api/form-api/introduction-to-form-api

namespace Drupal\example\Form;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Database\Database;
use Symfony\Component\HttpFoundation\RedirectResponse;


class MydataForm extends FormBase{
	  public function getFormId()
	  {
			return 'mydata_form';
      }
    public function buildForm(array $form, FormStateInterface $form_state) 
  {
	 
/*		
	 $form['pass']= array(
	'#type' => 'password',
	'#title' => $this->t('Password:'),
	'#size' => 60,
    '#maxlength' => 128,
	'#required'  => TRUE, 
	//'#default_value' => (isset($record['Fname']) && $_GET['num']) ? $record['Fname']:'',
	);		
	*/
	
	//-----------------------------------------	  	  
	if( $this->check_user_access() )
	{		
	$conn = Database::getConnection();
	$record = array();
	if(isset($_GET['num']))
	{
		$query = $conn->select('users_field_data','t')
		             ->condition('uid',$_GET['num'])
					 ->fields('t');
		$record = $query->execute()->fetchAssoc();
	}
	$form['fname']= array(
	'#type' => 'textfield',
	'#title' => $this->t('Your first name: '),
	'#size' => 60,
    '#maxlength' => 128,
	'#required'  => TRUE, 
	'#default_value' => (isset($record['first_name']) && $_GET['num']) ? $record['first_name']:'',
	);
	$form['lname']= array(
	'#type' => 'textfield',
	'#title' => $this->t('Your last name: '),
	'#default_value' => (isset($record['last_name']) && $_GET['num']) ? $record['last_name']:'',
	);
		
	$form['email']= array(
	'#type' => 'email',
	'#title' => $this->t('Your email: '),
	'#default_value' => (isset($record['mail']) && $_GET['num']) ? $record['mail']:'',
	);
	$form['position']= array(
	'#type' => 'textfield',
	'#title' => $this->t('Your position: '),
	'#default_value' => (isset($record['position']) && $_GET['num']) ? $record['position']:'',
	);	
	$form['active'] = array(
  '#type' => 'checkbox',
  '#title' => $this->t('Active'),
  '#default_value' => (isset($record['status']) && $_GET['num']) ? $record['status']:'',
	);
	
	 $form['profile_pic'] = array(
    '#title' => t('Image'),
    '#type' => 'file',
    '#description' => t('The image style chosen below would be applied for this uploaded image.'),
  //  '#default_value' => variable_get('profile_pic', ''),
   // '#upload_location' => 'public://profile_pic_images/',
 //  '#multiple' => TRUE,
  // '#upload_validators' => array(
 //   'file_validate_extensions' => array('png gif jpg jpeg'),
 //   'file_validate_size' => array(25600000),
 //   'file_validate_image_resolution' => array('800x600', '400x300'),
  
   );
   
//	$form['picture']['profile'] = array(
 //   '#type' => 'file',
//    '#title' => t('Profile picture')
//  );
  
   
 /* $form['picture']['picture_upload'] = array(
    '#type' => 'managed_file',
    '#title' => t('Upload picture'),
    '#size' => 48,
  //  '#description' => 'Some description',
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
	
  public function validateForm(array &$form, FormStateInterface $form_state) 
  {
	   /*        $name = $form_state->getValue('candidate_name');
          if(preg_match('/[^A-Za-z]/', $name)) {
             $form_state->setErrorByName('candidate_name', $this->t('your name must in characters without space'));
          }
        if (!intval($form_state->getValue('candidate_age'))) {
             $form_state->setErrorByName('candidate_age', $this->t('Age needs to be a number'));
            }
          $number = $form_state->getValue('candidate_age');
          if(!preg_match('/[^A-Za-z]/', $number)) {
             $form_state->setErrorByName('candidate_age', $this->t('your age must in numbers'));
          }
          if (strlen($form_state->getValue('mobile_number')) < 10 ) {
            $form_state->setErrorByName('mobile_number', $this->t('your mobile number must in 10 digits'));
           }
	   */
	if(is_numeric($form_state->getValue('fname')))
	{
		$form_state->setErrorByName('fname',$this->t('Error!!! The fist name must be a string'));
	}
	  parent::validateForm($form,$form_state);
  }
   public function submitForm(array &$form, FormStateInterface $form_state) 
   {
	   $field = $form_state->getValues();
	   $fname =  $field['fname'];
	   $lname = $field['lname'];
	   $email = $field['email'];
	   $position =  $field['position'];
	   $active = $field['active'];
	/*   
	//  $user = \Drupal\user\Entity\User::load(\Drupal::currentUser()->id());
	//	$uid = $user->uid;
	//	$account = user_load($_GET['num');
    global $user;
    $uid = $user->uid;
    $account = user_load($uid);
	//	drupal_set_message($uid);
	//	drupal_set_message($account);
		
		$file = $form_state['values']['profile'];
		unset($form_state['values']['profile']);
		$file->status = FILE_STATUS_PERMANENT;
		file_save($file);

		$edit['picture'] = $file;
		user_save($account, $edit);
		
	   
	   */
	//     global $user;
 //    $account = user_load($user->uid);
  
  // Save picture
 //if(!empty($form_state['values']['picture_upload'])){
    
	//$edit = array(
   //   'picture' => $form_state['values']['picture_upload'],
  //  );
  //  user_save($account, $edit);    
 // }
	    $validators = ['file_validate_extensions' => ['jpg']];
    $file = file_save_upload('profile_pic', $validators, FALSE, 0);
    if (!$file) {
      return;
    }
	   
	   if(isset($_GET['num']))
	   {
		   $field = array(
			'first_name' => $fname,
			'last_name' => $lname,
			'mail' => $email,
			'position'  => $position,
			'status'  => $active,
		   );
		   
		   $query = \Drupal::database();
		   $query->update('users_field_data')
				->fields($field)
			    ->condition('uid',$_GET['num'])
			   ->execute();			
			   drupal_set_message("updated successfully");
			   $form_state->setRedirect('example.display_table_controller_display');
	   }
	   else
	   {
		  $field = array(
			'first_name' => $fname,
			'last_name' => $lname,
			'mail' => $email,
			'position'  => $position,
			'status'  => $active,
		   );
		   
		   $query = \Drupal::database();
		   $query->insert('users_field_data')
				->fields($field)			 
			   ->execute();			
			   drupal_set_message("saved successfully");
			  $response = new RedirectResponse("/mydata/hello/table");
              $response->send();			  
	   }
	   
	   
		
	  
   }
  
  
}