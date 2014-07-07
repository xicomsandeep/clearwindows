<?php
App::uses('AppModel', 'Model');
/**
 * Event Model
 *
 * @property User $User
 * @property Customer $Customer
 * @property Round $Round
 */
class Event extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	/* public $validate = array(
		'id' => array(
			'naturalnumber' => array(
				'rule' => array('naturalnumber'),
			
			),
		),
		'event_type' => array(
			'notempty' => array(
				'rule' => array('notempty'),
			
			),
		),
		'link' => array(
			'notempty' => array(
				'rule' => array('notempty'),
		
			),
		),
		'date' => array(
			'datetime' => array(
				'rule' => array('datetime'),
			
			),
		),
		'user_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
	
			),
		),
		'customer_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
			
			),
		),
		'perms' => array(
			'notempty' => array(
				'rule' => array('notempty'),
		
			),
		),
		'loaction' => array(
			'notempty' => array(
				'rule' => array('notempty'),
	
			),
		),
		'round_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
		
			),
		),
	);
	 * */

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Customer' => array(
			'className' => 'Customer',
			'foreignKey' => 'customer_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Round' => array(
			'className' => 'Round',
			'foreignKey' => 'round_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
