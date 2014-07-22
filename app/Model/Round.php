<?php
App::uses('AppModel', 'Model');
/**
 * Round Model
 *
 * @property Customer $Customer
 * @property Customer $Customer
 * @property Event $Event
 */
class Round extends AppModel {

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
		'Customer' => array(
			'className' => 'Customer',
			'foreignKey' => 'customer_id',
		
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Customer' => array(
			'className' => 'Customer',
			'foreignKey' => 'round_id',
			'dependent' => true,

		),
		'Event' => array(
			'className' => 'Event',
			'foreignKey' => 'round_id',
			'dependent' => true,
		
		)
	);

}
