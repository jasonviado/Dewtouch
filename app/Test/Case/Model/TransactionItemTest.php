<?php
App::uses('TransactionItem', 'Model');

/**
 * TransactionItem Test Case
 *
 */
class TransactionItemTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.transaction_item',
		'app.transaction',
		'app.member',
		'app.table'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->TransactionItem = ClassRegistry::init('TransactionItem');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TransactionItem);

		parent::tearDown();
	}

}
