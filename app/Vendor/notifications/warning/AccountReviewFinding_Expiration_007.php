<?php
class AccountReviewFinding_Expiration_007 extends AccountReviewFinding_Expiration_Base {
	public $reminderDays = 10;

	public function __construct($options = array()) {
		parent::__construct($options);
	}
}
