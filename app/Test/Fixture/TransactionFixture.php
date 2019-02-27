<?php
/**
 * TransactionFixture
 *
 */
class TransactionFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'member_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'index'),
		'member_name' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'member_paytype' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 11, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'member_company' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'date' => array('type' => 'date', 'null' => true, 'default' => null),
		'year' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'month' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'ref_no' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'receipt_no' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'payment_method' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'batch_no' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'cheque_no' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'payment_type' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'renewal_year' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'remarks' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'subtotal' => array('type' => 'decimal', 'null' => true, 'default' => null, 'length' => '30,2', 'unsigned' => false),
		'tax' => array('type' => 'decimal', 'null' => true, 'default' => null, 'length' => '30,2', 'unsigned' => false),
		'total' => array('type' => 'decimal', 'null' => true, 'default' => null, 'length' => '30,2', 'unsigned' => false),
		'valid' => array('type' => 'boolean', 'null' => false, 'default' => '1'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'member_id' => array('column' => 'member_id', 'unique' => 0)
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
			'id' => 1,
			'member_id' => 1,
			'member_name' => 'Lorem ipsum dolor sit amet',
			'member_paytype' => 'Lorem ips',
			'member_company' => 'Lorem ipsum dolor sit amet',
			'date' => '2019-02-27',
			'year' => 1,
			'month' => 1,
			'ref_no' => 'Lorem ipsum dolor sit amet',
			'receipt_no' => 'Lorem ipsum dolor sit amet',
			'payment_method' => 'Lorem ipsum dolor sit amet',
			'batch_no' => 'Lorem ipsum dolor sit amet',
			'cheque_no' => 'Lorem ipsum dolor sit amet',
			'payment_type' => 'Lorem ipsum dolor sit amet',
			'renewal_year' => 1,
			'remarks' => 'Lorem ipsum dolor sit amet',
			'subtotal' => '',
			'tax' => '',
			'total' => '',
			'valid' => 1,
			'created' => '2019-02-27 04:13:00',
			'modified' => '2019-02-27 04:13:00'
		),
	);

}
