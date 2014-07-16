<?php
App::uses('AppController', 'Controller');
/**
 * Customers Controller
 *
 * @property Customer $Customer
 */
class CustomersController extends AppController {

/**
 * Purpose:add customer information
 * created on:2 july 2014
 * created by:Abhishek Tripathi
 */
  public function add()
  {
    if($this->request->is('Post'))
	{
		if($this->Customer->save($this->request->data))
		{
			$res=response_arr('Successfully added',0);
			echo json_encode($res);
			exit;
			
		}
		else{
			
		}
	}
  }
/**
 * Purpose:get customer information from ajax request 
 * created on:3 july 2014
 * created by:Abhishek Tripathi
 */  
  public function get_data()
  {
  	$customers=array();	
  	if($this->request->is('Post'))
	{
		$customer_info=$this->Customer->find('all',array('order'=>array('Customer.created'=>'desc')));
		foreach($customer_info as $customer)
		{
			$customers[]=$customer['Customer'];
		}
			$res=response_arr('Successfully added',0,$customers);
			echo json_encode($res);
			exit;
	}
  }
  
 /**
 * Purpose:get customer list from ajax request 
 * created on:3 july 2014
 * created by:Abhishek Tripathi
 */  
  public function get_data_filter()
  {
  
	{
		$query=$this->request->data['keyword'];
		
		$cond_arr=array();
		$customers=array();
		if(!empty($query)){
			
		  append_condition($cond_arr, 'Customer.first_name', 'like', $query);
		  append_condition($cond_arr, 'Customer.last_name', 'like', $query);
		$customer_info=$this->Customer->find('all',array('conditions'=>array('OR'=>$cond_arr),'order'=>array('Customer.created'=>'desc')));
		}
		else{
			
			$customer_info=$this->Customer->find('all');
		}
		
		foreach($customer_info as $customer)
		{
			$customers[]=$customer['Customer'];
		}
		$res=response_arr('Successfully added',0,$customers);
			echo json_encode($res);
			exit;
	}
  }
   
 /**
 * Purpose:get customer information from ajax request 
 * created on:4 july 2014
 * created by:Abhishek Tripathi
 */    
 
  public function get_user_info()
  {
  	$customer=array();
  	if($this->request->is('Post'))
	{
		$id=$this->request->data['id'];
		$customers=$this->Customer->find('first',array('conditions'=>array('Customer.id'=>$id)));
		if($customers)
		{
		  $res=response_arr('Successfully added',0,$customers);
			echo json_encode($res);
			exit;	
		}
	}
  }
  
   /**
 * Purpose:get customer list from ajax request 
 * created on:3 july 2014
 * created by:Abhishek Tripathi
 */  
  public function get_data_filter__()
  {
  
	{
		$customers=array();	
		$search_keyword=$this->request->data['keyword'];
		$this->loadModel('Search');
		$customer=$this->Search->find('all',array(
               'conditions'=>array('OR'=>array('name LIKE '=> "%{$search_keyword}%",'email LIKE'=>"%{$search_keyword}%",'description LIKE'=>"%{$search_keyword}%")),
                ));
	  foreach($customer as $cus){
	  	$customers[]=$cus['Search'];
	  }			
		
		$res=response_arr('Successfully added',0,$customers);
			echo json_encode($res);
			exit;
	}
  }

}
