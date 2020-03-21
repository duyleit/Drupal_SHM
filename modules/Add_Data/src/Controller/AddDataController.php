<?php
namespace Drupal\Add_Data\Controller;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Database\Database;
use Drupal\Core\Url;
use Symfony\Component\HttpFoundation\RedirectResponse;

class AddDataController extends ControllerBase{
	public function AddData()
	{
		if($this->check_user_access())
		//	if (TRUE)
		{
			//$response = new RedirectResponse("/form/add-data");
			//drupal_set_message("Access deny");
			return array(
		'#type' => 'markup',
		'#markup' =>'Hello, World!',
			);
		}
		else
		{
			drupal_set_message("Access deny");
		}
		
		
	
	}
	
	public function check_user_access()
	{
/*	$roles = [
			'View',
			'Administrator',
					];
					
		$current_role = \Drupal::currentUser()->getRoles();
		foreach($roles as $role) {
			if($role == $current_role[1]) {
				return TRUE;
			}
		}
*/       return TRUE;
	//	return FALSE;	
	  
	}
	
}	