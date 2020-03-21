<?php

namespace Drupal\example\Plugin\Block;
use Drupal\Core\Block\BlockBase;

class MydataBlock extends BlockBase{
	public function build()
	{
		$form = \Drupal::formBuilder->getForm('\Drupal\example\Form\MydataForm');
		return $form ;
	}
}