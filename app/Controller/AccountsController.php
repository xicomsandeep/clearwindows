<?php
App::uses('AppController', 'Controller');
/**
 * Accounts Controller
 *
 * @property Customer $Customer
 * @property Job $Job
 */
class AccountsController extends AppController {

/**
 * Purpose:add accounts information
 * created on:7 july 2014
 * created by:Abhishek Tripathi
 */
  public function add()
  {
  	if($this->request->is('Post'))
	{
		if($this->Account->save($this->request->data))
		{
			$res=response_arr('Successfully added',0,$this->request->data['Account']['customer_id']);
			echo json_encode($res);
			exit;
		}
	}
  }
  
 /**
 * Purpose:get customer account from ajax request 
 * created on:7 july 2014
 * created by:Abhishek Tripathi
 */    
 
  public function customer_accounts()
  {
  	$accounts=array();
  	if($this->request->is('Post'))
	{
		$accounts=array();  
		$id=$this->request->data['customer_id'];
		$accounts=$this->Account->find('all',array('conditions'=>array('Account.customer_id'=>$id)));
		$res=response_arr('Successfully added',0,$accounts);
			echo json_encode($res);
			exit;	
	}
  }  
/**
 * Purpose:delete account history
 * created on:7 july 2014
 * created by:Abhishek Tripathi
 */
   
  public function delete_account()
  {
  	$account_id=$this->request->data['account_id'];
	$customer_id=$this->request->data['customer_id'];
	$this->Account->Delete($account_id);
  	$jobs=array();
	$jobs=$this->Account->find('all',array('conditions'=>array('Account.customer_id'=>$customer_id)));
	$res=response_arr('Successfully added',0,$jobs);
			echo json_encode($res);
			exit;
	} 
  
  /**
 * Purpose:delete account history
 * created on:4 august 2014
 * created by:Abhishek Tripathi
 */
 public function account_list(){
 	$accounts=array();
	$this->Account->recursive=0;
	$accounts=$this->Account->find('all');
	$res=response_arr('Successfully added',0,$accounts);
			echo json_encode($res);
			exit;
 }



}
