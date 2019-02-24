<?php
	class RecordController extends AppController{
		
		var $components = array('RequestHandler');

		public function index(){
			ini_set('memory_limit','256M');
			set_time_limit(0);

		    if ($this->RequestHandler->isAjax()) {
		    	$start = (int)$this->request->query['start'];
		    	$length = (int)$this->request->query['length'];
		    	$page = $start > 0 ? ($start / $length) + 1 : 1;
		    	$total = $this->Record->find('count');
		    	$search = $this->request->query['search']['value'];
		    	$column = $this->request->query['order'][0]['column'];
		    	$dir = $this->request->query['order'][0]['dir'];
		    	$sort = $this->request->query['columns'][$column]['name'];
		    	$records = $this->Record->find('all',[
		    		'select' => ['id', 'name'],
		    		'conditions' => ['Record.name Like' => $search.'%'],
		    		'limit' => $length,
		    		'page' => $page,
		    		'order' => ["$sort $dir"],
		    	]);

		    	$list = [];

		    	foreach ($records as $key => $value) {
		    		$list[] = [
		    			'id' => $value['Record']['id'],
		    			'name' => $value['Record']['name'],
		    		];
		    	}

				$this->set([
				    'my_response' => [ 
				    	'page' => $page,
	    					'recordsTotal' => $total,
	    					'recordsFiltered' => $total,
				    "data" => $list
				],
				    '_serialize' => 'my_response',
				]);
				$this->RequestHandler->renderAs($this, 'json');

		    }else{
				$this->setFlash('Listing Record page too slow, try to optimize it.');
				$this->set('title',__('List Record'));
		    }
		}
		
		
// 		public function update(){
// 			ini_set('memory_limit','256M');
			
// 			$records = array();
// 			for($i=1; $i<= 1000; $i++){
// 				$record = array(
// 					'Record'=>array(
// 						'name'=>"Record $i"
// 					)			
// 				);
				
// 				for($j=1;$j<=rand(4,8);$j++){
// 					@$record['RecordItem'][] = array(
// 						'name'=>"Record Item $j"		
// 					);
// 				}
				
// 				$this->Record->saveAssociated($record);
// 			}
			
			
			
// 		}
	}