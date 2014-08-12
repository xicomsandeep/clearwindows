<?php
App::uses('AppModel', 'Model');
/**
 * Round Model
 *
 * @property Customer $Customer
 * @property Customer $Customer
 * @property Event $Event
 */
class Schedule extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	
	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Job' => array(
			'className' => 'Job',
			'foreignKey' => 'job_id',
		
		),
		'Round'=>array(
		 'className'=>'Round',
		 'foreignkey'=>'round_id'
		)
	);


}
