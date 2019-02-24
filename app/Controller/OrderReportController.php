<?php
	class OrderReportController extends AppController{

		public function index(){

			$this->setFlash('Multidimensional Array.');

			$this->loadModel('Order');
			$orders = $this->Order->find('all',array('conditions'=>array('Order.valid'=>1),'recursive'=>2));
			// debug($orders);exit;

			$this->loadModel('Portion');
			$portions = $this->Portion->find('all',array('conditions'=>array('Portion.valid'=>1),'recursive'=>2));

			$order_reports = $orders;

			$portions_reports = $portions;

			$portions_list = [];
			foreach ($portions_reports as $key => $value) {
				$portions_list[$value['Item']['id']]['id'] = $value['Item']['id'];
				$portions_list[$value['Item']['id']]['name'] = $value['Item']['name'];
				foreach ($value['PortionDetail'] as $keyPortion => $valuePortion) {
					$portions_list[$value['Item']['id']]['value'][] = ['value' => (float)$valuePortion['value'],'part' => $valuePortion['Part']['name'],'id' => $valuePortion['Part']['id']];
				}
			}

			$list = [];
			foreach ($order_reports as $key => $value) {
				$list[$key]['name'] = $value['Order']['name'];
				foreach ($value['OrderDetail'] as $keyOrderDetail => $valueOrderDetail) {
					$orderPortion = $portions_list[$valueOrderDetail['item_id']]['value'];
					foreach ($orderPortion as $keyorderPortion => $valueorderPortion) {
						if (isset($list[$key]['data'][$valueorderPortion['id']])) {
							$list[$key]['data'][$valueorderPortion['id']]['value'] += (float)$valueorderPortion['value'] * (float)$valueOrderDetail['quantity'];
						}else{
							$list[$key]['data'][$valueorderPortion['id']] = ['value' => (float)$valueorderPortion['value'] * (float)$valueOrderDetail['quantity'],'pert' => $valueorderPortion['part']];
						}
					}
					ksort($list[$key]['data']);
				}
			}

			// debug($list);exit;

			$this->set('order_reports',$list);

			$this->set('title',__('Orders Report'));
		}

		public function Question(){

			$this->setFlash('Multidimensional Array.');

			$this->loadModel('Order');
			$orders = $this->Order->find('all',array('conditions'=>array('Order.valid'=>1),'recursive'=>2));

			// debug($orders);exit;

			$this->set('orders',$orders);

			$this->loadModel('Portion');
			$portions = $this->Portion->find('all',array('conditions'=>array('Portion.valid'=>1),'recursive'=>2));
				
			// debug($portions);exit;

			$this->set('portions',$portions);

			$this->set('title',__('Question - Orders Report'));
		}

	}