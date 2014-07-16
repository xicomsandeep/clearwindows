<?php
App::uses('AppModel', 'Model');
/**
 * Customer Model
 *
 * @property Round $Round
 * @property Event $Event
 * @property Round $Round
 */
class Customer extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';
	

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
		'type' => array(
			'notempty' => array(
				'rule' => array('notempty'),
		
			),
		),
		'type' => array(
			'notempty' => array(
				'rule' => array('notempty'),
		
			),
		),
		'title' => array(
			'notempty' => array(
				'rule' => array('notempty'),
	
			),
		),
		'first_name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
	
			),
		),
		'last_name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				
			
			),
		),
		'telephone_no' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				 'message'    => 'sdfsdf'
			),
		),
		'mobile_no' => array(
			'numeric' => array(
				'rule' => array('numeric'),
		
			),
		),
		
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	
	// aftersave function for manage event log-----------------------
	public function afterSave($created,$options = array()){
	    $obj = ClassRegistry::init('Event');
		$event=array('Event'=>array(
		'event_type'=>"Add Customer",
		'customer_id'=>$this->data['Customer']['id'],
		
		));
		$obj->save($event);
	}
	

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Round' => array(
			'className' => 'Round',
			'foreignKey' => 'round_id',
		
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Event' => array(
			'className' => 'Event',
			'foreignKey' => 'customer_id',
			'dependent' => true,
	
		),
		'Round' => array(
			'className' => 'Round',
			'foreignKey' => 'customer_id',
			'dependent' => true,
			
		),
		'Job'=>array(
		  'className'=>'Job',
		  'foreignKey'=>'customer_id',
		  'dependent'=>'true'
		)
	);

}
