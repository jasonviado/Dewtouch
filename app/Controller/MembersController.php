<?php
App::uses('AppController', 'Controller');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Helper;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
require '../../vendor/autoload.php';
/**
 * Members Controller
 *
 */
class MembersController extends AppController {

/**
 * Scaffold
 *
 * @var mixed
 */
	public $scaffold;

	private $excelFormat = [
		'ods',
		'xlsx',
		'xls',
		'xml',
		'csv',
	];

	public function index(){

		ini_set('max_execution_time', 0);

		$this->set('title', __('Migrations'));

		$message = 'Invalid Extension';

		$message = '';
		if($this->request->is('post')){
			$data = $this->data['Members']['file'];
			$extension = pathinfo($data['name'], PATHINFO_EXTENSION);
			
			$message = 'Invalid Extension';

			if (in_array($extension,$this->excelFormat)) {
			    if('csv' == $extension) {
			        $reader = new Csv();
			    } else {
			        $reader = new Xlsx();
			    }

			    $spreadsheet = $reader->load($data['tmp_name']);
			     
			    $sheetData = $spreadsheet->getActiveSheet()->toArray();

			    if (!isset($sheetData[0])) {
			    	$message = 'Invalid Format';
			    	$this->set(compact('message'));
			    }

			    $header = $sheetData[0];

			    $members = [
			    	'name' => array_search('Member Name', $header),
			    	'no' => array_search('Member No', $header),
					'type' => array_search('Member No', $header),
					'company' => array_search('Member Company', $header),
			    ];

			    $transactions = [
			    	'member_paytype' => array_search('Member Pay Type', $header),
					'date' => array_search('Date', $header),
					'year' => array_search('Date', $header),
					'month' => array_search('Date', $header),
					'ref_no' => array_search('Ref No.', $header),
					'receipt_no' => array_search('Receipt No', $header),
					'payment_method' => array_search('Payment By', $header),
					'batch_no' => array_search('Batch No', $header),
					'cheque_no' => array_search('Cheque No', $header),
					'payment_type' => array_search('Payment Description', $header),
					'renewal_year' => array_search('Renewal Year', $header),
					'remarks' => array_search('Payment Description', $header),
					'subtotal' => array_search('subtotal', $header),
					'tax' => array_search('totaltax', $header),
					'total' => array_search('total', $header),

			    ];

			    $transactions_item = [
			    	'description' => array_search('Payment Description', $header),
			    	'unit_price' => array_search('subtotal', $header),
			    	'sum' => array_search('subtotal', $header),
			    ];

			    array_shift($sheetData);

			    $saveMember = [];

			    foreach ($sheetData as $key => $value) {

			    	// Save Member Table
			    	$memberNo = explode(' ', $value[$members['no']]);
			    	$saveMember = [
						'name' => $value[$members['name']],
						'no' => isset($memberNo[1]) ? $memberNo[1] : '',
						'type' => isset($memberNo[0]) ? $memberNo[0] : '',
						'company' => $value[$members['company']],
			    	];
			    	$this->Member->create();
			    	$this->Member->save($saveMember);

			    	// Save Transaction DB
			    	$member_id = $this->Member->getLastInsertId();
			    	$saveTransaction = [
			    		'member_id' => $member_id,
			    		'member_name' => $value[$members['name']],
			    		'member_paytype' => $value[$transactions['member_paytype']],
			    		'member_company' => $value[$members['company']],
			    		'date' => date('Y-m-d', strtotime($value[$transactions['date']])),
			    		'year' => date('Y', strtotime($value[$transactions['date']])),
			    		'month' => date('m', strtotime($value[$transactions['date']])),
			    		'ref_no' => $value[$transactions['ref_no']],
			    		'receipt_no' => $value[$transactions['receipt_no']],
			    		'payment_method' => $value[$transactions['payment_method']],
			    		'batch_no' => $value[$transactions['batch_no']],
			    		'cheque_no' => $value[$transactions['cheque_no']],
			    		'payment_type' => $value[$transactions['payment_type']],
			    		'renewal_year' => $value[$transactions['renewal_year']],
			    		'remarks' => NULL,
			    		'subtotal' => $value[$transactions['subtotal']],
			    		'tax' => $value[$transactions['tax']],
			    		'total' => $value[$transactions['total']],
			    	];

			    	$this->Member->Transaction->create();
			    	$this->Member->Transaction->save($saveTransaction);
			    	$transaction_id = $this->Member->getLastInsertId();

			    	$saveTransactionItem = [
			    		'transaction_id' => $transaction_id,
			    		'description' => 'Being Payment for : '.$value[$transactions_item['description']]. ' : '.date('Y', strtotime($value[$transactions['date']])),
			    		'quantity' => 1,
			    		'unit_price' => $value[$transactions_item['unit_price']],
			    		'uom' => NULL,
			    		'sum' => $value[$transactions_item['sum']],
			    		'table' => 'Member',
			    		'table_id' => $member_id,
			    	];

			    	$this->Member->Transaction->TransactionItem->create();
			    	$this->Member->Transaction->TransactionItem->save($saveTransactionItem);

			    }

			    // $this->Member->save($saveMember);


			    debug('save');exit;




			debug($sheetData);exit;


			    $array = [];
			    foreach ($sheetData as $key => $value) {
					$array[] = 
						[
							'name' => $value[0],
							'email' => $value[1],
						];
			    }



				$this->FileUpload->saveMany($array);

				$message = 'Successfully Uploaded';
			}
	    }


		$this->set(compact('message'));
	}

}
