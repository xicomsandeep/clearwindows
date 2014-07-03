<?php
App::uses('AppModel', 'Model');
/**
 * Job Model
 *
 * @property User $User
 * @property Account $Account
 */
class Job extends AppModel {

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
		'user_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
			
			),
		),
		'description' => array(
			'notempty' => array(
				'rule' => array('notempty'),
			
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
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
		
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Account' => array(
			'className' => 'Account',
			'foreignKey' => 'job_id',
			'dependent' => true,
		
		)
	);

}
