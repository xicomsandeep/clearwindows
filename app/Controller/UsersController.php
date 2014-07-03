<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *  @Author Abhishek Tripathi
 * @property User $User
 * @property CustomerType $CustomerType
 */
class UsersController extends AppController {

/**
 * index method
 * @Author Abhishek Tripathi
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$this->paginate = array(
        'conditions' => array('User.group_id' => 2),
        'limit' => 10
    );
		$this->set('users', $this->paginate('User'));
	}
	
	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('add');
		}

/**
 * view method
 * @Author Abhishek Tripathi 
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
		
	}

/**
 * add method
 * @Author Abhishek Tripathi
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
	}

/**
 * edit method
 * @Author Abhishek Tripathi
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
	}

/**
 * delete method
 * @Author Abhishek Tripathi
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('User deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('User was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 * @Author Abhishek Tripathi
 * @return void
 */
	public function admin_index() {
		$this->loadModel('Group');
		$this->User->recursive = 0;
		$this->User->recursive = 0;
		$this->paginate = array(
        'conditions' => array('User.group_id' => 2)
         );
		$users=$this->paginate();
		$groups=$this->Group->find('list',array('id','name'));
		$view_title='Users list';
		$this->set(compact('users','groups','view_title'));
		$this->render('admin_manage');
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
	    $this->set('view_title','view employee');
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * admin_add method
 * @Author Abhishek Tripathi
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->User->create();
			
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
		$groups = $this->User->Group->find('list',array('fields'=>array('id','name')));
		$view_title='Add employee';
		$this->set(compact('groups','view_title'));
		$this->render('admin_edit');
	}

/**
 * admin_edit method
 * @Author Abhishek Tripathi
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->User->id=$id;
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
		$view_title="Employee Edit";
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups','view_title'));
	}

/**
 * admin_delete method
 * @Author Abhishek Tripathi
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('User deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('User was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
/**
 * admin_login method
 * @Author Abhishek Tripathi

 */
	
	
	public function admin_login()
	{
		if ($this->Auth->login())
		{
			$this->redirect(array('controller' => 'users', 'action' => 'index'));
		}
		$cookie_val = array();		
		if ( $this->Cookie->read('remember_me_cookie') )
		{
			$cookie_val = $this->Cookie->read('remember_me_cookie');			
		}
		$this->set('cookie_values', $cookie_val);				
		
		if ( !empty($this->request->data) )
		{
			//pr($this->request->data);die;
			if ( $this->Auth->login() )
			{
				if ( $this->request->data['User']['remember_me'] && empty($cookie_val) )
				{
					unset($this->request->data['User']['remember_me']);
					$this->Cookie->write('remember_me_cookie', $this->request->data['User'], true, '2 weeks');
					$this->request->data['User']['password'] = $this->Auth->password($this->request->data['User']['password']);
				}
				if ($this->Auth->user('role') == UserRoleConst::RoleAdmin)
				{
					$redirect = array ('controller'=>'users', 'action'=>'index', 'admin' => true);
				}
				else
				{
					$redirect = $this->Auth->redirect();
				}
				$this->redirect($redirect);
			}
			else
			{
				$this->Session->setFlash(__('Make sure username and password typed currectly'), 'default', array(), 'error');
			}
		}		
	}	
	
	/**
	 * Method Name : admin_logout	 
	 * Author Name : Abhishek Tripathi
	 * Date : 30 june 2014
	 * Description : used for logout from admin panel 
	 */

	public function admin_logout()
	{
		$this->Session->destroy();		
		$this->Auth->logout();
		$this->Session->setFlash(__('You are logged out successfully'),'default',array(),'success');
		$referer = array('controller' => 'users', 'action' => 'admin_login', 'admin' => true);
		$this->redirect($referer);
	}
	/**
	 * Purpose: Admin Dashboard
	 * Autor Name:Abhishek Tripathi
	 * Date: 30 june 2014
	 */
	 public function admin_dashboard(){
		 $this->set('title_for_layout', 'Administrator | Dashboard');
		 } 
	
		/**
 * Admin edit password
 * @param:
 * @return:
 */
    public function admin_change_password()
    {
		if ( !empty($this->request->data) )
		{
			$data = $this->request->data;
			$data['User']['id'] = $this->Auth->user('id');
			
			if (!empty($data['User']['password']) && $this->Auth->user('role') == UserRoleConst::RoleAdmin)
			{
				$data['User']['password'] =$data['User']['password'];
				if ($this->User->save($data, false))
				{
					$this->Session->setFlash(__('Your password has been changed.'),'default', array(),'success');
					$this->redirect(array('controller' => 'users', 'action' => 'change_password', 'admin' => true));
				}
			}
		}
    }	
    
    /**
* Purpose : FOR ADMIN TO MAKE ACTION DELETE Active inactive
* Created on :30june 2014
* Author : Abhishek Tripathi
*/
    function admin_manage_action()
    {
            if(count($this->params['data']))
            {
                    $message = '';

                    $ids = $this->params['data']['list'];
                    if(!empty($ids))
                    {
                            $task = $this->params['data']['task'];

                            if($task == "delete")
                            {
                                    $this->User->deleteAll(array('User.id' => $ids), true);

                                    $message = 'Deleted successfully.';
                            }
								$this->Session->setFlash($message, 'flash_success');
                    }

                    $this->redirect($this->referer());
            }
    } 
	
	/**
	 * purpose:login admin
	 * created on:2 july 2014
	 * created by:Abhishek Tripathi
	 */
	 
	 public function login()
	 {
	 	debug($this->request->data);
	 	if ($this->Auth->login())
		     {
		     	$this->Session->setFlash('Successfully logged in', 'flash_success');
			  $this->redirect(array('action'=>'dashboard'));
			 }
		else{
			 	
				
			 }
	 }
	 
	 /**
	  * purpose:work space
	  * created by:Abhishek Tripathi
	  * created on:2 july
	  */
	 public function dashboard()
	 {
		$this->loadModel('CustomerType'); 
		  $customer_type=$this->CustomerType->find('list',array('id','name'));
		  $this->set(compact('customer_type'));	
	 } 
	 
	
}
