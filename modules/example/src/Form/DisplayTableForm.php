<?php

namespace Drupal\example\Form;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Database\Database;
use Drupal\Core\Url;


class DisplayTableForm extends FormBase{
	  public function getFormId()
	  {
			return 'DisplayTableForm';
      }
	  public function buildForm(array $form, FormStateInterface $form_state) 
	{
	 $header_table = array(
			'Username' => t('User name'),
			'Firstname' => t('First name'),
			'Lastname' => t('Last name'),
			'Email' => t('Your Email'),
			'Position' => t('Position'),
			'Active' => t('Active'),
			);
			
		//http://valuebound.com/resources/blog/how-to-create-form-table-drupal-8
	$query = \Drupal::database()->select('users_field_data', 'u');
	$query->fields('u', ['uid','name','first_name','last_name','mail','position','status']);  // chu y hoa thuong
	//http://valuebound.com/resources/blog/how-to-create-form-table-pagination-drupal-8
	$pager = $query->extend('Drupal\Core\Database\Query\PagerSelectExtender')->limit(4);  // phan trang
	$results = $pager->execute()->fetchAll();
	 
	$rows=array();
    foreach($results as $data){
      //    $delete = Url::fromUserInput('/mydata/form/delete/'.$data->uid);
     //   $edit   = Url::fromUserInput('/mydata/form/mydata?num='.$data->uid);
	//    $add    = Url::fromUserInput('/mydata/form/add');
	    $rows[] = array(
			 			
			'Username' => $data->name,
			'Firstname' => $data->first_name,
			'Lastname' => $data->last_name,
			'Email' => $data->mail,
			'Position' => $data->position,
			'Active' => $data->status,
						
		//	\Drupal::l('Add', $add),
        //    \Drupal::l('Edit', $edit),
		//	\Drupal::l('Delete', $delete),
		);
     }
	 if (!empty($rows)) {
		    //display data in site
		    $form['nodes'] = array (
            '#type' => 'tableselect',
            '#header' => $header_table,
          //  '#rows' => $rows,
		    '#options' => $rows,
            '#empty' => t('No users found'),
        );
		
		// phan trang
		
		$form['pager'] = array (
			'#type' => 'pager',
			
			);	
		$form['submit'] = array(
            '#type' => 'submit',
            '#value' => t('Submit'),
        );	
			
	 }
	 
	   $form['button1'] = [
      '#type' => 'button',
      '#value' => 'Delete',
      '#description' => $this->t('Delete, #type = button'),
    ];
		return $form;
	
	}
	public function submitForm(array &$form, FormStateInterface $form_state) 
   {
	   
   }
   
}	  