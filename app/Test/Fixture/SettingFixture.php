<?php
/**
 * Setting Fixture
 */
class SettingFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'active' => array('type' => 'integer', 'null' => false, 'default' => '1', 'length' => 1, 'unsigned' => false),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'variable' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'value' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'type' => array('type' => 'string', 'null' => false, 'default' => 'text', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'default_value' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'values' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'options' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 150, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'hidden' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 1, 'unsigned' => false),
		'required' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 1, 'unsigned' => false),
		'setting_group_slug' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'key' => 'index', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'setting_type' => array('type' => 'string', 'null' => false, 'default' => 'constant', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'order' => array('type' => 'integer', 'null' => false, 'default' => '0', 'unsigned' => false),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'FK_settings_setting_groups' => array('column' => 'setting_group_slug', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => '2',
			'active' => '1',
			'name' => 'DB Schema Version',
			'variable' => 'DB_SCHEMA_VERSION',
			'value' => 'e1.0.1.008',
			'default_value' => null,
			'values' => null,
			'type' => 'text',
			'options' => null,
			'hidden' => '1',
			'required' => '0',
			'setting_group_slug' => null,
			'setting_type' => 'constant',
			'order' => '0',
			'modified' => '2016-08-24 19:41:38',
			'created' => '2015-12-19 00:00:00'
		),
		array(
			'id' => '3',
			'active' => '1',
			'name' => 'Client ID',
			'variable' => 'CLIENT_ID',
			'value' => 'test',
			'default_value' => null,
			'values' => null,
			'type' => 'text',
			'options' => null,
			'hidden' => '1',
			'required' => '0',
			'setting_group_slug' => null,
			'setting_type' => 'constant',
			'order' => '0',
			'modified' => '2016-01-21 06:10:19',
			'created' => '2015-12-19 00:00:00'
		),
		array(
			'id' => '4',
			'active' => '1',
			'name' => 'Bruteforce wrong logins',
			'variable' => 'BRUTEFORCE_WRONG_LOGINS',
			'value' => '3',
			'default_value' => null,
			'values' => null,
			'type' => 'number',
			'options' => '{"min":1,"max":10,"step":1}',
			'hidden' => '0',
			'required' => '0',
			'setting_group_slug' => 'BFP',
			'setting_type' => 'constant',
			'order' => '0',
			'modified' => '2015-12-19 00:00:00',
			'created' => '2015-12-19 00:00:00'
		),
		array(
			'id' => '5',
			'active' => '1',
			'name' => 'Bruteforce second ago',
			'variable' => 'BRUTEFORCE_SECONDS_AGO',
			'value' => '60',
			'default_value' => null,
			'values' => null,
			'type' => 'number',
			'options' => '{"min":10,"max":120,"step":1}',
			'hidden' => '0',
			'required' => '0',
			'setting_group_slug' => 'BFP',
			'setting_type' => 'constant',
			'order' => '0',
			'modified' => '2015-12-19 00:00:00',
			'created' => '2015-12-19 00:00:00'
		),
		array(
			'id' => '10',
			'active' => '1',
			'name' => 'Default currency',
			'variable' => 'DEFAULT_CURRENCY',
			'value' => 'EGP',
			'default_value' => null,
			'values' => 'configDefaultCurrency',
			'type' => 'select',
			'options' => '{"AUD":"AUD","CAD":"CAD","USD":"USD","EUR":"EUR","GBP":"GBP","JPY":"JPY"}',
			'hidden' => '0',
			'required' => '0',
			'setting_group_slug' => 'CUE',
			'setting_type' => 'config',
			'order' => '0',
			'modified' => '2016-08-30 14:39:45',
			'created' => '2015-12-19 00:00:00'
		),
		array(
			'id' => '11',
			'active' => '1',
			'name' => 'Type',
			'variable' => 'SMTP_USE',
			'value' => '1',
			'default_value' => null,
			'values' => null,
			'type' => 'select',
			'options' => '{"0":"Mail","1":"SMTP"}',
			'hidden' => '0',
			'required' => '0',
			'setting_group_slug' => 'MAILCNF',
			'setting_type' => 'constant',
			'order' => '0',
			'modified' => '2016-09-10 23:34:22',
			'created' => '2015-12-19 00:00:00'
		),
		array(
			'id' => '12',
			'active' => '1',
			'name' => 'SMTP host',
			'variable' => 'SMTP_HOST',
			'value' => 'smtp.gmail.com',
			'default_value' => null,
			'values' => null,
			'type' => 'text',
			'options' => null,
			'hidden' => '0',
			'required' => '0',
			'setting_group_slug' => 'MAILCNF',
			'setting_type' => 'constant',
			'order' => '1',
			'modified' => '2016-09-10 23:34:22',
			'created' => '2015-12-19 00:00:00'
		),
		array(
			'id' => '13',
			'active' => '1',
			'name' => 'SMTP user',
			'variable' => 'SMTP_USER',
			'value' => 'dev@eramba.org',
			'default_value' => null,
			'values' => null,
			'type' => 'text',
			'options' => null,
			'hidden' => '0',
			'required' => '0',
			'setting_group_slug' => 'MAILCNF',
			'setting_type' => 'constant',
			'order' => '3',
			'modified' => '2016-09-10 23:34:22',
			'created' => '2015-12-19 00:00:00'
		),
		array(
			'id' => '14',
			'active' => '1',
			'name' => 'SMTP password',
			'variable' => 'SMTP_PWD',
			'value' => '@todo',
			'default_value' => null,
			'values' => null,
			'type' => 'password',
			'options' => null,
			'hidden' => '0',
			'required' => '0',
			'setting_group_slug' => 'MAILCNF',
			'setting_type' => 'constant',
			'order' => '4',
			'modified' => '2016-09-10 23:34:22',
			'created' => '2015-12-19 00:00:00'
		),
		array(
			'id' => '15',
			'active' => '1',
			'name' => 'SMTP timeout',
			'variable' => 'SMTP_TIMEOUT',
			'value' => '60',
			'default_value' => null,
			'values' => null,
			'type' => 'number',
			'options' => '{"min":1,"max":120,"step":1}',
			'hidden' => '0',
			'required' => '0',
			'setting_group_slug' => 'MAILCNF',
			'setting_type' => 'constant',
			'order' => '5',
			'modified' => '2016-09-10 23:34:22',
			'created' => '2015-12-19 00:00:00'
		),
		array(
			'id' => '16',
			'active' => '1',
			'name' => 'SMTP port',
			'variable' => 'SMTP_PORT',
			'value' => '465',
			'default_value' => null,
			'values' => null,
			'type' => 'text',
			'options' => null,
			'hidden' => '0',
			'required' => '0',
			'setting_group_slug' => 'MAILCNF',
			'setting_type' => 'constant',
			'order' => '6',
			'modified' => '2016-09-10 23:34:22',
			'created' => '2015-12-19 00:00:00'
		),
		array(
			'id' => '18',
			'active' => '1',
			'name' => 'No reply Email',
			'variable' => 'NO_REPLY_EMAIL',
			'value' => 'noreply@eramba.org',
			'default_value' => null,
			'values' => null,
			'type' => 'text',
			'options' => null,
			'hidden' => '0',
			'required' => '0',
			'setting_group_slug' => 'MAILCNF',
			'setting_type' => 'constant',
			'order' => '7',
			'modified' => '2016-09-10 23:34:22',
			'created' => '2015-12-19 00:00:00'
		),
		array(
			'id' => '19',
			'active' => '1',
			'name' => 'Cron security key',
			'variable' => 'CRON_SECURITY_KEY',
			'value' => 'egkrjng328525798',
			'default_value' => null,
			'values' => null,
			'type' => 'text',
			'options' => null,
			'hidden' => '0',
			'required' => '0',
			'setting_group_slug' => 'SECKEY',
			'setting_type' => 'constant',
			'order' => '0',
			'modified' => '2015-12-19 00:00:00',
			'created' => '2015-12-19 00:00:00'
		),
		array(
			'id' => '20',
			'active' => '1',
			'name' => 'Bruteforce ban from minutes',
			'variable' => 'BRUTEFORCE_BAN_FOR_MINUTES',
			'value' => '5',
			'default_value' => null,
			'values' => null,
			'type' => 'number',
			'options' => '{"min":1,"max":120,"step":1}',
			'hidden' => '0',
			'required' => '0',
			'setting_group_slug' => 'BFP',
			'setting_type' => 'constant',
			'order' => '0',
			'modified' => '2015-12-19 00:00:00',
			'created' => '2015-12-19 00:00:00'
		),
		array(
			'id' => '21',
			'active' => '1',
			'name' => 'Banners off',
			'variable' => 'BANNERS_OFF',
			'value' => '1',
			'default_value' => null,
			'values' => null,
			'type' => 'checkbox',
			'options' => null,
			'hidden' => '0',
			'required' => '0',
			'setting_group_slug' => 'BANNER',
			'setting_type' => 'constant',
			'order' => '0',
			'modified' => '2015-12-19 00:00:00',
			'created' => '2015-12-19 00:00:00'
		),
		array(
			'id' => '22',
			'active' => '1',
			'name' => 'Debug',
			'variable' => 'DEBUG',
			'value' => '1',
			'default_value' => null,
			'values' => 'configDebug',
			'type' => 'checkbox',
			'options' => null,
			'hidden' => '0',
			'required' => '0',
			'setting_group_slug' => 'DEBUGCFG',
			'setting_type' => 'config',
			'order' => '0',
			'modified' => '2016-08-16 12:14:37',
			'created' => '2015-12-19 00:00:00'
		),
		array(
			'id' => '23',
			'active' => '1',
			'name' => 'Email Debug',
			'variable' => 'EMAIL_DEBUG',
			'value' => '1',
			'default_value' => null,
			'values' => 'configEmailDebug',
			'type' => 'checkbox',
			'options' => null,
			'hidden' => '0',
			'required' => '0',
			'setting_group_slug' => 'DEBUGCFG',
			'setting_type' => 'config',
			'order' => '0',
			'modified' => '2016-08-16 12:14:37',
			'created' => '2015-12-19 00:00:00'
		),
		array(
			'id' => '24',
			'active' => '1',
			'name' => 'Risk Appetite',
			'variable' => 'RISK_APPETITE',
			'value' => '10',
			'default_value' => null,
			'values' => null,
			'type' => 'number',
			'options' => '{"min":0,"max":9999,"step":1}',
			'hidden' => '0',
			'required' => '0',
			'setting_group_slug' => 'RISKAPPETITE',
			'setting_type' => 'constant',
			'order' => '0',
			'modified' => '2016-03-14 12:28:34',
			'created' => '2015-12-19 00:00:00'
		),
		array(
			'id' => '25',
			'active' => '1',
			'name' => 'Use SSL',
			'variable' => 'USE_SSL',
			'value' => '1',
			'default_value' => null,
			'values' => null,
			'type' => 'checkbox',
			'options' => null,
			'hidden' => '0',
			'required' => '0',
			'setting_group_slug' => 'MAILCNF',
			'setting_type' => 'constant',
			'order' => '2',
			'modified' => '2016-09-10 23:34:22',
			'created' => '2015-12-19 00:00:00'
		),
		array(
			'id' => '26',
			'active' => '1',
			'name' => 'Timezone',
			'variable' => 'TIMEZONE',
			'value' => null,
			'default_value' => null,
			'values' => 'configTimezone',
			'type' => 'select',
			'options' => null,
			'hidden' => '0',
			'required' => '0',
			'setting_group_slug' => 'TZONE',
			'setting_type' => 'config',
			'order' => '0',
			'modified' => '2015-12-19 00:00:00',
			'created' => '2015-12-19 00:00:00'
		),
	);

}
