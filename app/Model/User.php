<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 * @Author Abhishek Tripathi
 * @property Group $Group
 */
class User extends AppModel {

/**
 * Validation rules
 *  @Author Abhishek Tripathi
 * @var array
 */
	public $validate = array(
		'id' => array(
			'naturalnumber' => array(
				'rule' => array('naturalnumber'),
			
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
		'email' => array(
			'email' => array(
				'rule' => array('email'),
				
			),
		),
		'password' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				
			),
		),
		'slug' => array(
			'notempty' => array(
				'rule' => array('notempty'),
			
			),
		),
		'profile_image' => array(
			'notempty' => array(
				'rule' => array('notempty'),
		
			),
		),
		'group_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
		
			),
		),
		'address' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				
			),
		),
		'zip_code' => array(
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
		'Group' => array(
			'className' => 'Group',
			'foreignKey' => 'group_id',
			'conditions' => '',
			'fields' => array('id','name'),
			'order' => ''
		)
	);
	/**
	 * purpose:Password encryption
	 * created on:30 june 2014
	 * created by:Abhishek Tripathi
	 */
  function beforeSave( $options = array()  )
  {
	$this->data['User']['password'] =  AuthComponent::password($this->data['User']['password']);
    return true;
  }  
	
	
}
