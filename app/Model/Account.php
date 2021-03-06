<?php
App::uses('AppModel', 'Model');
/**
 * Account Model
 *
 * @property Job $Job
 */
class Account extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'id' => array(
			'naturalnumber' => array(
				'rule' => array('naturalnumber'),
			
			),
		),
	
		
	);
	
	
	
	// aftersave function for manage event log-----------------------
	public function afterSave($created,$options = array()){
	    $obj = ClassRegistry::init('Event');
		$customer = ClassRegistry::init('Customer');
		$customer_detail=$this->Customer->find('first',array('conditions'=>array('Customer.id'=>$this->data['Account']['customer_id']),'fields'=>array('first_name','last_name')));
		
		$event=array('Event'=>array(
		'event_type'=>"Add account detail",
		'customer_id'=>$this->data['Account']['customer_id'],
		'customer_name'=>$customer_detail['Customer']['first_name'].' '.$customer_detail['Customer']['last_name'],
		
		));
		$obj->save($event);
	}
   // beforedelete function for manage event log---------------------
	public function beforeDelete($cascade = true){
		$customer = ClassRegistry::init('Customer');
		
		$account=$this->find('first',array('condition'=>array('Account.id'=>$this->id)));
		$customer_detail=$this->Customer->find('first',array('conditions'=>array('Customer.id'=>$account['Account']['customer_id']),'fields'=>array('first_name','last_name')));
		
		 $obj = ClassRegistry::init('Event');
		$event=array('Event'=>array(
		'event_type'=>"Delete account detail",
		'customer_id'=>$account['Account']['customer_id'],
		'customer_name'=>$customer_detail['Customer']['first_name'].' '.$customer_detail['Customer']['last_name'],
		));
		$obj->save($event);
		
	}


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		
		'Customer'=>array(
		   'className'=>'Customer',
		    'foreignKey'=>'customer_id'
		),
		'Job' => array(
			'className' => 'Job',
			'foreignKey' => 'job_id'
			
		)
	);
}
