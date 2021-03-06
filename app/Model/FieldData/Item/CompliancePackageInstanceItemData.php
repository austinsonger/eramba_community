<?php
App::uses('ItemDataEntity', 'FieldData.Model/FieldData');
App::uses('Hash', 'Utility');
App::uses('ComplianceTreatmentStrategy', 'Model');

class CompliancePackageInstanceItemData extends ItemDataEntity
{
	public function packageByTreatmentStrategyChart()
	{
		$data = [
			'yAxis' => Hash::extract($this->getData(), 'CompliancePackage.{n}.name'),
			'label' => [
				__('Compliant'), __('Not Compliant'), __('Not Applicable'), __('Overlooked')
			],
			'stack' => [
				'1', '1', '1', '1'
			],
			'data' => [
				$this->_countComplianceManagements(function($Item) {
					return $Item->compliance_treatment_strategy_id == ComplianceTreatmentStrategy::STRATEGY_COMPLIANT;
				}),
				$this->_countComplianceManagements(function($Item) {
					return $Item->compliance_treatment_strategy_id == ComplianceTreatmentStrategy::STRATEGY_NOT_COMPLIANT;
				}),
				$this->_countComplianceManagements(function($Item) {
					return $Item->compliance_treatment_strategy_id == ComplianceTreatmentStrategy::STRATEGY_NOT_APPLICABLE;
				}),
				$this->_countComplianceManagements(function($Item) {
					return $Item->compliance_treatment_strategy_id == null;
				}),
			]
		];

		return $data;
	}

	public function packageByStatusChart()
	{
		$data = [
			'yAxis' => Hash::extract($this->getData(), 'CompliancePackage.{n}.name'),
			'label' => [
				__('Project Expired'), __('Project Task Expired'), __('Policy Review Expired'), __('Control Audit Failed'),
				__('Control Audit Expired'), __('Control Maintenance Expired'), __('Control Issues'), __('Control in Design')
			],
			'stack' => [
				'1', '1', '1', '1', '1', '1', '1', '1'
			],
			'data' => [
				$this->_countComplianceManagements(function($Item) {
					return $Item->getStatusValue('project_expired');
				}),
				$this->_countComplianceManagements(function($Item) {
					return $Item->getStatusValue('project_expired_task');
				}),
				$this->_countComplianceManagements(function($Item) {
					return $Item->getStatusValue('security_policy_expired_reviews');
				}),
				$this->_countComplianceManagements(function($Item) {
					return $Item->getStatusValue('security_service_audits_last_not_passed');
				}),
				$this->_countComplianceManagements(function($Item) {
					return $Item->getStatusValue('security_service_audits_last_missing');
				}),
				$this->_countComplianceManagements(function($Item) {
					return $Item->getStatusValue('security_service_maintenances_last_missing');
				}),
				$this->_countComplianceManagements(function($Item) {
					return $Item->getStatusValue('security_service_control_with_issues');
				}),
				$this->_countComplianceManagements(function($Item) {
					return $Item->getStatusValue('security_service_control_in_design');
				}),
			]
		];

		return $data;
	}

	protected function _countComplianceManagements($compCallable)
	{
		$data = [];

		$CompliancePackages = $this->CompliancePackage;
		if (empty($CompliancePackages)) {
			return $data;
		}

		foreach ($CompliancePackages as $CompliancePackage) {
			$CompliancePackageItems = $CompliancePackage->CompliancePackageItem;
			if (empty($CompliancePackageItems)) {
				continue;
			}

			$val = 0;

			foreach ($CompliancePackageItems as $CompliancePackageItem) {
				$ComplianceManagement = $CompliancePackageItem->ComplianceManagement;
				if ($ComplianceManagement !== null && call_user_func($compCallable, $ComplianceManagement)) {
					$val++;
				}
			}

			$data[] = $val;
		}

		return $data;
	}
}