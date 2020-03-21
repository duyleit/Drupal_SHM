<?php
namespace Drupal\example\Form;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Form\ConfirmFormBase;
use Drupal\Core\Url;
use Drupal\Core\Render\Element;

class DeleteForm extends ConfirmFormBase
{
	public function getFormId()
	{
		return 'delete_form';
	}
	public $cid;
	
	public function getQuestion()
	{
		return t('Do you want to delete %cid ?', array('%cid' => $this->cid));
	}
	public function getCancelUrl()
	{
		return new Url('example.display_table_controller_display');
	}
	public function getDescription()
	{
		return t('Only do this if you are sure');		
	}
	public function getConfirmText()
	{
		return t('Delete it !');
	}
	 public function getCancelText()
	 {
		return t('Cancel');
	}
	
	public function buildForm(array $form,FormStateInterface $form_state,$cid = NULL)
	{
		 if( $this->check_user_access() )
		{		
		$this->uid=$cid;
		return parent::buildForm($form,$form_state);
		}
		else
		{
		  //$current_role = \Drupal::currentUser()->getRoles();
		//	drupal_set_message($current_role[1]);
			// $response = new RedirectResponse("/mydata/hello/table");
			drupal_set_message("Access deny");
		}
	
	}
	  public function validateForm(array &$form, FormStateInterface $form_state) 
	  {
		parent::validateForm($form, $form_state);
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
	 public function submitForm(array &$form,FormStateInterface $form_state)
	 {
		 $query = \Drupal::database();
		 $query->delete('users_field_data')
			   ->condition('uid',$this->uid)
			   ->execute();
	    drupal_set_message("successfully deleted");
       $form_state->setRedirect('example.display_table_controller_display');		
	 }
	
}