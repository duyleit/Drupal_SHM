<?php

namespace Drupal\example\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;


class ExampleForm extends FormBase{

public function getFormID(){
	return 'example_form';
	}	
	
public function buildForm (array $form,FormStateInterface $form_state){
//http://valuebound.com/resources/blog/how-to-create-form-table-drupal-8
$query = \Drupal::database()->select('test_example', 'u');
$query->fields('u', ['ID','Fname','Phone_number','Email']);  // chu y hoa thuong
//http://valuebound.com/resources/blog/how-to-create-form-table-pagination-drupal-8
$pager = $query->extend('Drupal\Core\Database\Query\PagerSelectExtender')->limit(5);  // phan trang
$results = $pager->execute()->fetchAll();

//other ways
/*$query = db_select('student', 's')
  ->fields('s', array('id', 'name', 'DOB'))
  ->condition('s.uid', $uid)
  ->orderBy('s.dob', 'DESC')
  ->range(0, 10)
  ->execute();
*/



//$header = array(t('STT'),t('Name'),t('Phone_Number'),t('Email'));
$header = [
     'Userid' => t('User id'),
     'Username' => t('User name'),
	 'Phonenumber' => t('Phone number'),
     'Email' => t('Email'),
   ];
// Initialize an empty array
$output = array();
// Next, loop through the $results array
foreach ($results as $result) {
     
       $output[$result->ID] = [
         'Userid' => $result->ID,     // 'userid' was the key used in the header
         'Username' => $result->Fname, // 'Username' was the key used in the header
         'Phonenumber' => $result->Phone_number,    // 'email' was the key used in the header
		 'Email' => $result->Email,
       ];
     
   }
$form['table'] = array(
'#type' => 'tableselect',
'#header' => $header,
'#options' => $output,
'#empty' => t('No users found'),
);

 foreach( $output as $key => $value ) // bo dau stick
	{
	  $form['table'][$key]['#disabled'] = true;
	}

// phan trang
$form['pager'] = array (
'#type' => 'pager'
);	
	
	
	
	
// Button.
    $form['button1'] = [
      '#type' => 'button',
      '#value' => 'Delete',
      '#description' => $this->t('Delete, #type = button'),
    ];
 
	 $form['button2'] = [
      '#type' => 'button',
      '#value' => 'Insert',
      '#description' => $this->t('Insert, #type = button'),
    ];
	
	 $form['button3'] = [
      '#type' => 'button',
      '#value' => 'Save',
      '#description' => $this->t('Save, #type = button'),
    ];
	
	 $form['button4'] = [
      '#type' => 'button',
      '#value' => 'Cancel',
      '#description' => $this->t('Cancel, #type = button'),
    ];
	
/*$results = db_query("SELECT * FROM {test_example}");
$header = array(t('STT'),t('Name'),t('Phone_Number'),t('Email'));
$rows = array();	
	
foreach($resutls AS $result)
{
	  $rows[] = array(
	  $results->ID,
	  $results->Fname,
	  $results->Phone_number,
	  $results->email,
	);
}	

   $rows [] = array(  
  // cell 1 
  array('data' => t('Row 2 – Cell 1')),  
  // cell 2 
 array('data' => t('Row 2 – Cell 2')),  
  // cell 3 
  array('data' => t('Row 2 – Cell 3'))  
);

$table = array(
  '#type' => 'table',
  '#header' => $header,
  '#rows' => $rows,
  '#attributes' => array(
    'id' => 'my-module-table',
  ),
);
$markup = drupal_render($table);
$pager = array('#theme' => 'pager');
$markup .= drupal_render($pager);
//  $form['table'] = array(
//  '#type' => 'table',
//  '#header' => $header,
//  '#rows' => $rows,
//);

*/

/*	
	$form['fname']= array(
	'#type' => 'textfield',
	'#title' => $this->t('Your first name.'),
	'#size' => 60,
    '#maxlength' => 128,
	'#required'  => TRUE, 
	);
	
	$form['phone_number']= array(
	'#type' => 'tel',
	'#title' => $this->t('Your phone number.')
	);
	
		
	$form['email']= array(
	'#type' => 'email',
	'#title' => $this->t('Your email ')
	);
*/	
/*	 https://api.drupal.org/api/drupal/namespace/Drupal!Core!Render!Element/8.2.x
     https://api.drupal.org/api/drupal/core%21core.api.php/group/form_api/8.3.x

$form['date']= array(
	'#type' => 'date',
	'#title' => $this->t('Enter date')
	);
*/	
/*	$form['number']= array(
	'#type' => 'number',
	'#title' => $this->t('Enter number')
	);
*/	
	
/*	$form['high_school']['tests_taken']= array(
	'#type' => 'checkboxes',
	'#options' => drupal_map_assoc(array(t('SAT'),t('ACT'))),
	'#title' => t('What standardized tests did you take?'),
	);

	
	$form['image_example_image_fid']= array(
	'#title' => t('image'),
	'#type' => 'managed_file',
	'#description' => t('the upload image will be displayed on this page using  the image style choosen below.'),
	'#defaut_value' => variable_get('image_example_image_fid',''),
	'#upload_location' => 'public://image_example_images/',
	);
*/	
	
/*	$form['action']['#type']='action';
	$form['action']['submit']= array(
	'#type' => 'submit',
	'#value' => $this->t('save'),
	'#button_type' => 'primary',
	);
	
	 $form['save'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Save'),
    );
	
	/* $form['intro'] = [
      '#markup' => t('Use this form to send a message to an e-mail address. No spamming!'),
    ];
    $form['email'] = [
      '#type' => 'textfield',
      '#title' => t('E-mail address'),
      '#required' => TRUE,
    ];
    $form['message'] = [
      '#type' => 'textarea',
      '#title' => t('Message'),
      '#required' => TRUE,
    ];
    $form['submit'] = [
      '#type' => 'submit',
      '#value' => t('Submit'),
    ];
	
	
	
	 $form['description'] = [
      '#type' => 'item',
      '#markup' => $this->t('This example shows the use of all input-types.'),
    ];
	
	 // Color.
    $form['color'] = [
      '#type' => 'color',
      '#title' => $this->t('Color'),
      '#default_value' => '#ffffff',
      '#description' => 'Color, #type = color',
    ];
	
	// Date.
    $form['expiration'] = [
      '#type' => 'date',
      '#title' => $this->t('Content expiration'),
      '#default_value' => ['year' => 2020, 'month' => 2, 'day' => 15],
      '#description' => 'Date, #type = date',
    ];

    // Date-time.
    $form['datetime'] = [
      '#type' => 'datetime',
      '#title' => 'Date Time',
      '#date_increment' => 1,
      '#date_timezone' => drupal_get_user_timezone(),
      '#default_value' => drupal_get_user_timezone(),
      '#description' => $this->t('Date time, #type = datetime'),
    ];
	
	 // URL.
    $form['url'] = [
      '#type' => 'url',
      '#title' => $this->t('URL'),
      '#maxlength' => 255,
      '#size' => 30,
      '#description' => $this->t('URL, #type = url'),
    ];

	  // Range.
    $form['size'] = [
      '#type' => 'range',
      '#title' => t('Size'),
      '#min' => 10,
      '#max' => 100,
      '#description' => $this->t('Range, #type = range'),
    ];

    // Radios.
    $form['settings']['active'] = [
      '#type' => 'radios',
      '#title' => t('Poll status'),
      '#options' => [0 => $this->t('Closed'), 1 => $this->t('Active')],
      '#description' => $this->t('Radios, #type = radios'),
    ];

    // Search.
    $form['search'] = [
      '#type' => 'search',
      '#title' => $this->t('Search'),
      '#description' => $this->t('Search, #type = search'),
    ];
	
	  // Select.
    $form['favorite'] = [
      '#type' => 'select',
      '#title' => $this->t('Favorite color'),
      '#options' => [
        'red' => $this->t('Red'),
        'blue' => $this->t('Blue'),
        'green' => $this->t('Green'),
      ],
      '#empty_option' => $this->t('-select-'),
      '#description' => $this->t('Select, #type = select'),
    ];

    // Multiple values option elements.
    $form['select_multiple'] = [
      '#type' => 'select',
      '#title' => 'Select (multiple)',
      '#multiple' => TRUE,
      '#options' => [
        'sat' => 'SAT',
        'act' => 'ACT',
        'none' => 'N/A',
      ],
      '#default_value' => ['sat'],
      '#description' => 'Select Multiple',
    ];

	  // TableSelect.
    $options = [
      1 => ['first_name' => 'Indy', 'last_name' => 'Jones'],
      2 => ['first_name' => 'Darth', 'last_name' => 'Vader'],
      3 => ['first_name' => 'Super', 'last_name' => 'Man'],
    ];

    $header = [
      'first_name' => t('First Name'),
      'last_name' => t('Last Name'),
    ];

    $form['table'] = [
      '#type' => 'tableselect',
      '#title' => $this->t('Users'),
      '#header' => $header,
      '#options' => $options,
      '#empty' => t('No users found'),
    ];
	
	 // Add a submit button that handles the submission of the form.
    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
      '#description' => $this->t('Submit, #type = submit'),
    ];

    // Add a reset button that handles the submission of the form.
    $form['actions']['reset'] = [
      '#type' => 'button',
      '#button_type' => 'reset',
      '#value' => t('Reset'),
      '#description' => $this->t('Submit, #type = button, #button_type = reset, #attributes = this.form.reset();return false'),
      '#attributes' => [
        'onclick' => 'this.form.reset(); return false;',
      ],
    ];
	
	  // Image Buttons.
    $form['image_button'] = [
      '#type' => 'image_button',
      '#value' => 'Image button',
      '#src' => drupal_get_path('module', 'examples') . '/images/100x30.svg',
      '#description' => $this->t('image file, #type = image_button'),
    ];

    // Button.
    $form['button'] = [
      '#type' => 'button',
      '#value' => 'Button',
      '#description' => $this->t('Button, #type = button'),
    ];
	
	  // Containers have no visual display but wrap any contained elements in a
    // div tag.
    $form['accommodation'] = [
      '#type' => 'container',
    ];

    $form['accommodation']['title'] = [
      '#type' => 'html_tag',
      '#tag' => 'p',
      '#value' => $this->t('Special Accommodations (type = container)'),
    ];

    $form['accommodation']['diet'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Dietary Restrictions'),
    ];

    $form['actions'] = ['#type' => 'actions'];

    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
    ];
	
	  // Conventional field set.
    $form['book'] = [
      '#type' => 'fieldset',
      '#title' => $this->t('Book Info (type = fieldset)'),
    ];

    $form['book']['title'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Title'),
    ];

    $form['book']['publisher'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Publisher'),
    ];
	/////////////////////////////////
	 $form['description'] = [
      '#type' => 'item',
      '#markup' => $this->t('This form example demonstrates functioning of an AJAX callback.'),
    ];

    // The #ajax attribute used in the temperature input element defines an ajax
    // callback that will invoke the 'updateColor' method on this form object.
    // Whenever the temperature element changes, it will invoke this callback
    // and replace the contents of the 'color_wrapper' container with the
    // results of this method call.
    $form['temperature'] = [
      '#title' => $this->t('Temperature'),
      '#type' => 'select',
      '#options' => $this->getColorTemperatures(),
      '#empty_option' => $this->t('- Select a color temperature -'),
      '#ajax' => [
        // Could also use [get_class($this), 'updateColor'].
        'callback' => '::updateColor',
        'wrapper' => 'color-wrapper',
      ],
    ];

    // Add a wrapper that can be replaced with new HTML by the ajax callback.
    // This is given the ID that was passed to the ajax callback in the '#ajax'
    // element above.
    $form['color_wrapper'] = [
      '#type' => 'container',
      '#attributes' => ['id' => 'color-wrapper'],
    ];

    // Add a color element to the color_wrapper container using the value
    // from temperature to determine which colors to include in the select
    // element.
    $temperature = $form_state->getValue('temperature');
    if (!empty($temperature)) {
      $form['color_wrapper']['color'] = [
        '#type' => 'select',
        '#title' => $this->t('Color'),
        '#options' => $this->getColorsByTemperature($temperature),
      ];
    }
*/
    // Add a submit button that handles the submission of the form.
 /*   $form['actions'] = [
      '#type' => 'actions',
      'submit' => [
        '#type' => 'submit',
        '#value' => $this->t('Submit'),
      ],
    ];

	*/
	
	return $form;
}

 public function updateColor(array $form, FormStateInterface $form_state) {
    return $form['color_wrapper'];
  }	

 protected function getColorsByTemperature($temperature) {
    return $this->getColors()[$temperature]['colors'];
  }

protected function getColorTemperatures() {
    return array_map(function ($color_data) {
      return $color_data['name'];
    }, $this->getColors());
  }

 protected function getColors() {
    return [
      'warm' => [
        'name' => $this->t('Warm'),
        'colors' => [
          'red' => $this->t('Red'),
          'orange' => $this->t('Orange'),
          'yellow' => $this->t('Yellow'),
        ],
      ],
      'cool' => [
        'name' => $this->t('Cool'),
        'colors' => [
          'blue' => $this->t('Blue'),
          'purple' => $this->t('Purple'),
          'green' => $this->t('Green'),
        ],
      ],
    ];
  }
  
	
public function validateForm(array &$form,FormStateInterface $form_state){

/*	if(is_numeric($form_state->getValue('fname')))
	{
		$form_state->setErrorByName('fname',$this->t('Error!!! The fist name must be a string'));
	}
	
	if( strlen($form_state->getValue('phone_number'))<10 )
	{
		$form_state->setErrorByName('phone_number',$this->t('Phone number must be at least 10 digits'));
	}
	
	if (!valid_email_address($form_state->getValue('email'))) 
	{
      $form_state->setErrorByName('email', t('That e-mail address is not valid.'));
    }
	*/
}	

public function simple() {
    return [
      '#markup' => '<p>' . $this->t('Simple page: The quick brown fox jumps over the lazy dog.') . '</p>',
    ];
  }
  
function theme_table($variables) {
  $header = $variables['header'];
  $rows = $variables['rows'];
  $attributes = $variables['attributes'];
  $caption = $variables['caption'];
  $colgroups = $variables['colgroups'];
  $sticky = $variables['sticky'];
  $responsive = $variables['responsive'];
  $empty = $variables['empty'];

    // Add sticky headers, if applicable.
 // if (count($header) && $sticky) {
 //   drupal_add_library('system', 'drupal.tableheader');
    // Add 'sticky-enabled' class to the table to identify it for JS.
    // This is needed to target tables constructed by this function.
 //   $attributes['class'][] = 'sticky-enabled';
//  }
  // If the table has headers and it should react responsively to columns hidden
  // with the classes represented by the constants RESPONSIVE_PRIORITY_MEDIUM
  // and RESPONSIVE_PRIORITY_LOW, add the tableresponsive behaviors.
 // if (count($header) && $responsive) {
//    drupal_add_library('system', 'drupal.tableresponsive');
     // Add 'responsive-enabled' class to the table to identify it for JS.
     // This is needed to target tables constructed by this function.
 //   $attributes['class'][] = 'responsive-enabled';
//  }

  $output = '<table' . new Attribute($attributes) . ">\n";

  if (isset($caption)) {
    $output .= '<caption>' . $caption . "</caption>\n";
  }

  // Format the table columns:
  if (count($colgroups)) {
    foreach ($colgroups as $colgroup) {
      $attributes = array();

      // Check if we're dealing with a simple or complex column
      if (isset($colgroup['data'])) {
        foreach ($colgroup as $key => $value) {
          if ($key == 'data') {
            $cols = $value;
          }
          else {
            $attributes[$key] = $value;
          }
        }
      }
      else {
        $cols = $colgroup;
      }

      // Build colgroup
      if (is_array($cols) && count($cols)) {
        $output .= ' <colgroup' . new Attribute($attributes) . '>';
        foreach ($cols as $col) {
          $output .= ' <col' . new Attribute($col) . ' />';
        }
        $output .= " </colgroup>\n";
      }
      else {
        $output .= ' <colgroup' . new Attribute($attributes) . " />\n";
      }
    }
  }

  // Add the 'empty' row message if available.
  if (!count($rows) && $empty) {
    $header_count = 0;
    foreach ($header as $header_cell) {
      if (is_array($header_cell)) {
        $header_count += isset($header_cell['colspan']) ? $header_cell['colspan'] : 1;
      }
      else {
        $header_count++;
      }
    }
    $rows[] = array(array(
        'data' => $empty,
        'colspan' => $header_count,
        'class' => array('empty', 'message'),
      ));
  }

  $responsive = array();
  // Format the table header:
  if (count($header)) {
    $ts = tablesort_init($header);
    // HTML requires that the thead tag has tr tags in it followed by tbody
    // tags. Using ternary operator to check and see if we have any rows.
    $output .= (count($rows) ? ' <thead><tr>' : ' <tr>');
    $i = 0;
    foreach ($header as $cell) {
      $i++;
      // Track responsive classes for each column as needed. Only the header
      // cells for a column are marked up with the responsive classes by a
      // module developer or themer. The responsive classes on the header cells
      // must be transferred to the content cells.
      if (!empty($cell['class']) && is_array($cell['class'])) {
        if (in_array(RESPONSIVE_PRIORITY_MEDIUM, $cell['class'])) {
          $responsive[$i] =  RESPONSIVE_PRIORITY_MEDIUM;
        }
        elseif (in_array(RESPONSIVE_PRIORITY_LOW, $cell['class'])) {
          $responsive[$i] =  RESPONSIVE_PRIORITY_LOW;
        }
      }
      $cell = tablesort_header($cell, $header, $ts);
      $output .= _theme_table_cell($cell, TRUE);
    }
    // Using ternary operator to close the tags based on whether or not there are rows
    $output .= (count($rows) ? " </tr></thead>\n" : "</tr>\n");
  }
  else {
    $ts = array();
  }

  // Format the table rows:
  if (count($rows)) {
    $output .= "<tbody>\n";
    $flip = array(
      'even' => 'odd',
      'odd' => 'even',
    );
    $class = 'even';
    foreach ($rows as $row) {
      // Check if we're dealing with a simple or complex row
      if (isset($row['data'])) {
        $cells = $row['data'];
        $no_striping = isset($row['no_striping']) ? $row['no_striping'] : FALSE;

        // Set the attributes array and exclude 'data' and 'no_striping'.
        $attributes = $row;
        unset($attributes['data']);
        unset($attributes['no_striping']);
      }
      else {
        $cells = $row;
        $attributes = array();
        $no_striping = FALSE;
      }
      if (count($cells)) {
        // Add odd/even class
        if (!$no_striping) {
          $class = $flip[$class];
          $attributes['class'][] = $class;
        }

        // Build row
        $output .= ' <tr' . new Attribute($attributes) . '>';
        $i = 0;
        foreach ($cells as $cell) {
          $i++;
          // Add active class if needed for sortable tables.
          $cell = tablesort_cell($cell, $header, $ts, $i);
          // Copy RESPONSIVE_PRIORITY_LOW/RESPONSIVE_PRIORITY_MEDIUM
          // class from header to cell as needed.
          if (isset($responsive[$i])) {
            if (is_array($cell)) {
              $cell['class'][] = $responsive[$i];
            }
            else {
              $cell = array(
                'data' => $cell,
                'class' => $responsive[$i],
              );
            }
          }
          $output .= _theme_table_cell($cell);
        }
        $output .= " </tr>\n";
      }
    }
    $output .= "</tbody>\n";
  }

  $output .= "</table>\n";
  return $output;
}  
  
  
public function submitForm(array &$form, FormStateInterface $form_state) {
  //  https://api.drupal.org/api/drupal/core%21lib%21Drupal%21Core%21Database%21database.api.php/group/database/8.4.x
 /*  $dk = db_insert('test_example')
    ->fields(array(
	    'fname' => $form_state->getValue('fname'),
		'phone_number' => $form_state->getValue('phone_number'),
		'email' => $form_state->getValue('email'),
	))
	->execute();
  	// dsm($dk);
	drupal_set_message('your data has been added !!!');
*/
// https://www.drupal.org/node/310079
//https://api.drupal.org/api/drupal/includes%21theme.inc/function/theme_table/7.x


$results = db_query("SELECT * FROM {test_example}");
$header = array(t('STT'),t('Name'),t('Phone_Number'),t('Email'));
$rows = array();	
	
foreach($resutls AS $result)
{
	  $rows[] = array(
	  $result->ID,
	  $result->Fname,
	  $result->Phone_number,
	  $result->email,
	);
}	

 /*$table_data = array(
      'header'     => $header,
      'rows'       => $rows,
      'sticky'     => TRUE,
      'empty'      => 'No results found',
      'attributes' => array(),
      'caption'    => 'Test Caption',
      'colgroups'  => array()
    );
	$table_attributes = array('id' => 'ralphs-node-table');
  theme('table',  $header,  $rows, $table_attributes);	
// theme_table($table_data);
// theme('table', array('header' => $header, 'rows' => $rows));
//dpm($output);
/*
$result = db_query("SELECT * FROM {test_example}");
$headers = array(
      array('data' => 'First_Name', 'field' => 'First_Name'),
      array('data' => 'Last_Name', 'field' => 'Last_Name'),
  );

  $rows = array(
          array('field' => 'First_Name', 'data' => $result->ID),
          array('field' => 'Last_Name', 'data' => $result->Fname),
  );

    $table_data = array(
      'header'     => $headers,
      'rows'       => $rows,
      'sticky'     => TRUE,
      'empty'      => 'No results found',
      'attributes' => array(),
      'caption'    => count($data['rows']) . ' rows',
      'colgroups'  => array()
    );

  //  $output = theme_table($table_data);	
	
/*	$conn = Database::getConnection();
	$conn->insert('example')->fields(
array(
    'fname' => $form_state->getValue('fname'),
    'phone_number' => $form_state->getValue('phone_number'),
    'email' => $form_state->getValue('email'),
    )
)->execute();


$Data = db_insert('example')
->fields(
array(
'id' => 2,
'fname' => $form_state->getValue('fname'),
'phone_number' => $form_state->getValue('phone_number'),
'email' => $form_state->getValue('email'),
)
)->execute();

*/	 
/*	 $result=db_query_range( SELECT node_field_data.nid, node_field_data.title,node_field_data.created
	 FROM {node_field_data} WHERE node_field_data.uid = :uid' ,0,2,array(':uid' => '1'));
	 foreach($result as record){		 dsm($record);
		 //Perform operation on $record->title, etc. Here
	 }
*/	 
/*    $profile_value = array( 
						'id'    => 1,
                        'fname' => $form_state->getValue('fname'),
						'phone_number' => $form_state->getValue('phone_number'),
						'email' => $form_state->getValue('email'),
						);
	//$query = \Drupal::database();
         $dk = db_insert('example')	
		   -> fields($profile_value)				
		   -> execute();
			dsm($dk);
   /* drupal_set_message($this->t('Your first name is @first_name <br> Your number phone is @phone_number <br> Your email is @email',
                  array( '@first_name' => $form_state->getValue('fname'),
						'@phone_number' => $form_state->getValue('phone_number'),
						'@email' => $form_state->getValue('email'),
				  )));
	 */
  }
  
  
}	
	
	
