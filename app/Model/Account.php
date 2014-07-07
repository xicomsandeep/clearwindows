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
			
		),
		'Customer'=>array(
		   'className'=>'Customer',
		    'foreignKey'=>'customer_id'
		)
	);
}
