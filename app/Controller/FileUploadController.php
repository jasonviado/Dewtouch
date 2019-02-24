<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Helper;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
require '../../vendor/autoload.php';
class FileUploadController extends AppController {

	private $excelFormat = [
		'ods',
		'xlsx',
		'xls',
		'xml',
		'csv',
	];

	public function index() {

		$this->set('title', __('File Upload Answer'));
		$message = '';
		if($this->request->is('post')){
			$data = $this->data['FileUpload']['file'];

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

			    $array = [];
			    foreach ($sheetData as $key => $value) {
					$array[] = 
						[
							'name' => $value[0],
							'email' => $value[1],
						];
			    }


				array_shift($array);

				$this->FileUpload->saveMany($array);

				$message = 'Successfully Uploaded';
			}
	    }
		$file_uploads = $this->FileUpload->find('all');
		$this->set(compact('file_uploads','message'));
	}
}