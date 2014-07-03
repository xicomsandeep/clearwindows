<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Controller', 'Controller');


/**
 * Application Controller
 *
 * @project Cleaning Window
 * @since 29 june 2014
 * @version Cake Php 2.3.8
 * @author : AQbhishek Tripathi
 */
class AppController extends Controller 
{

	var $helpers = array('Html', 'Form', 'Session', 'Js');
	var $components = array('Email','Session','Cookie', 'Auth');
	
	function beforeFilter()
	{
		if($this->params['prefix'] == 'admin')
		{
			if ($this->Auth->user())
			{
				if ( $this->Auth->user('role') == UserRoleConst::RoleUser )
				{
					$this->redirect('/');
				}
			}
			$this->__set_adminfilter();
			$this->layout = 'admin';
		}
		else
	{	//Set the search value
			//CHANGING THE DEFAULT FIELDS OF AUTH TO USE EMAIL ID INSTEAD OF USERNAME
			// $this->Auth->authenticate = array('Form' => array
					// (
							// 'fields' => array('username' => 'email', 'password' => 'password'),
							// 'scope' => array('status' => STATUS_ACTIVE, 'role' => UserRoleConst::RoleUser)
					// )
			// );
			$this->Auth->loginRedirect = array('controller' => 'users', 'action' => 'index');
			$this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'index');
			$this->Auth->loginError = "Enter correct Username or Email and Password to login.";
			$this->Auth->authError = 'You are not authorized to access that location.';
	      	// set cookie options		
			$this->loadModel('User');	
	       $user_info=$this->User->find('first',array('conditions'=>array('User.id'=>$this->Auth->user('id'))));
		   $this->set(compact('user_info'));
		  

	  }
	  }
	
	
		
	/**
	 * Method Name : __set_adminfilter
	 * Author Name : Abhishek Tripathi
	 * Date : 02-08-2013
	 * Description : check for Administrator
	 */
	 
	private function __set_adminfilter()
	{
		$this->Auth->authenticate = array('Form' => array
				(
						'fields' => array('username' => 'username', 'password' => 'password'),
						'scope' => array('role' => UserRoleConst::RoleAdmin)
				)
		);
		//CHANGING THE DEFAULT FIELDS OF AUTH TO USE EMAIL ID INSTEAD OF USERNAME
	
		$this->Auth->loginRedirect = array('controller' => 'users', 'action' => 'admin_index');
		$this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'admin_login');
		$this->Auth->authError = "You must be logged in to access this area.";
		$this->Auth->loginError = "Enter correct Username and Password to login.";		
		if($this->Auth->user('id') && $this->Auth->user('role') == 'admin')
		{
			$this->set('SESS_LOGGEDIN', true);
			$this->set('SESS_ADMIN_LOGGEDIN', true);
			$this->set('SESS_ADMIN_USERID', $this->Auth->user('id'));
			$this->set('SESS_ADMIN_USERNAME', $this->Auth->user('username'));
		}
	}
	

}
