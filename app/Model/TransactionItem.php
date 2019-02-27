<?php
App::uses('AppModel', 'Model');
/**
 * TransactionItem Model
 *
 * @property Transaction $Transaction
 * @property Table $Table
 */
class TransactionItem extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Transaction' => array(
			'className' => 'Transaction',
			'foreignKey' => 'transaction_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Table' => array(
			'className' => 'Table',
			'foreignKey' => 'table_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
