<?php
/**
 * @file
 * Contains \Drupal\amazing_forms\Form\ContributeForm.
 */
//https://www.ondrupal.com/learn-drupal/creating-custom-block-form-drupal8
namespace Drupal\custom_blocks\Form;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Component\Utility\UrlHelper;

/**
 * Contribute form.
 */
class BlockTestFormm extends FormBase {
  /**
   * {@inheritdoc}
   */
  public function getFormId() {
	return 'block_test_formm';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
 /*	$form['title'] = array(
      '#type' => 'textfield',
      '#title' => t('Title'),
      '#required' => TRUE,
    );
    $form['description'] = array(
      '#type' => 'textarea',
      '#title' => t('Description'),
    );
    $form['submit'] = array(
      '#type' => 'submit',
      '#value' => t('Submit'),
    );
    return $form;*/
	 $user = \Drupal\user\Entity\User::load(\Drupal::currentUser()->id());
	 $name=  $user->get('name')->value;
	 
	 echo "<table>";
     echo "<tr>";
     echo "<td>User name:&nbsp;&nbsp;&nbsp</td>";
	if($name)
	{
		echo "<td><font color='red'>".$name."</font></td>";
	}
	else
	{
		echo "<td><font color='red'>"."Guest"."</font></td>";
	}
     echo "</tr>";
     echo "</table>";

	 
	//$form['login_name']= array(
	//'#type' => 'label',
	//'#title' => $name,
	//print( $name);
//	);
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {

  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
	
  }
}
?>