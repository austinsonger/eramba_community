<?php
App::uses('AppHelper', 'View/Helper');

class BusinessContinuityPlanAuditsHelper extends AppHelper
{
	public $helpers = ['Html', 'Ajax', 'Eramba', 'FieldData.FieldData', 'FormReload'];
	public $settings = array();
	
	public function __construct(View $view, $settings = array())
	{
		parent::__construct($view, $settings);
		$this->settings = $settings;
	}

	public function businessContinuityPlanField(FieldDataEntity $Field)
	{
		return $this->FieldData->input($Field, $this->FormReload->triggerOptions());
	}
}
