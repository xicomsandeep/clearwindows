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
		'debit' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				
			),
		),
		'last_debit' => array(
			'notempty' => array(
				'rule' => array('notempty'),
			
			),
		),
		'job_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
	
			),
		),
		'payment_date' => array(
			'datetime' => array(
				'rule' => array('datetime'),
			
			),
		),
		'service_date' => array(
			'date' => array(
				'rule' => array('date'),
			
			),
		),
		'status' => array(
			'numeric' => array(
				'rule' => array('numeric'),
	
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Job' => array(
			'className' => 'Job',
			'foreignKey' => 'job_id'
			
		)
	);
}
