<?php
App::uses('AppController', 'Controller');
/**
 * Customers Controller
 *
 * @property Customer $Customer
 */
class JobsController extends AppController {

/**
 * Purpose:add customer information
 * created on:2 july 2014
 * created by:Abhishek Tripathi
 */
  public function add()
  {
  	if($this->request->is('Post'))
	{
		
		if($this->Job->save($this->request->data))
		{
			$res=response_arr('Successfully added',0,$this->request->data["Job"]['customer_id']);
			echo json_encode($res);
			exit;
		}
	}
  }

/**
 * Purpose:add customer information
 * created on:2 july 2014
 * created by:Abhishek Tripathi
 */
   
  public function get_customer_job()
  {
  	$id=$this->request->data['id'];
  	$jobs=array();
	$jobs=$this->Job->get_all($id);
	//debug($job_list);exit;
    $res=response_arr('Successfully added',0,$jobs);
			echo json_encode($res);
			exit;
	
  }
/**
 * Purpose:delete job
 * created on:4 july 2014
 * created by:Abhishek Tripathi
 */
   
  public function delete_job()
  {
  	$job_id=$this->request->data['job_id'];
	$customer_id=$this->request->data['customer_id'];
	$this->Job->Delete($job_id);
  	$jobs=array();
	$jobs=$this->Job->get_all($customer_id);
	//debug($job_list);exit;
    $res=response_arr('Successfully added',0,$jobs);
			echo json_encode($res);
			exit;
	
  }  
/**
 * Purpose:customer job List
 * created on:7 july 2014
 * created by:Abhishek Tripathi
 */
   
  public function customer_job_list()
  {
  	$customer_id=$this->request->data['id'];
	$jobs=array();
	$job_list=$this->Job->get_all($customer_id);
	//debug($job_list);exit;
	if($job_list){
		foreach($job_list as $job)
		{
			$jobs[]=$job['Job'];
		}
	}
    $res=response_arr('Successfully added',0,$jobs);
			echo json_encode($res);
			exit;
	
  }  
  
/**
 * Purpose:job List
 * created on:8 july 2014
 * created by:Abhishek Tripathi
 */  
 
 public function job_list()
 {
 	$jobs=array();
	$jobs=$this->Job->get_all();
	$res=response_arr('Successfully added',0,$jobs);
			echo json_encode($res);
			exit;
	
 }
 
 /**
 * Purpose:job List filter on keyword
 * created on:8 july 2014
 * created by:Abhishek Tripathi
 */  
 
 public function job_list_filter()
 {
 	$jobs=array();
	$jobs=$this->Job->get_data_filter($this->request->data['keyword']);
	$res=response_arr('Successfully added',0,$jobs);
			echo json_encode($res);
			exit;
	
 }
  /**
 * Purpose:job detail
 * created on:8 july 2014
 * created by:Abhishek Tripathi
 */  
 public function job_detail(){
 	$jobs=array();
	$id=$this->request->data['id'];
	$jobs=$this->Job->get_detail($id);
	$res=response_arr('Successfully added',0,$jobs);
			echo json_encode($res);
			exit;
	
 }
 
   /**
 * Purpose:round_list
 * created on:28 july 2014
 * created by:Abhishek Tripathi
 */ 
 public function rounds(){
 	$this->loadModel('Round');
 	$rounds=array();
	$rounds=$this->Round->find('all',array('fields'=>array('id','name')));
    foreach($rounds as $round){
    	$ro[]=$round['Round'];
    }
	$res=response_arr('Successfully added',0,$ro);
			echo json_encode($res);
			exit;
 }
 
  /**
 * Purpose:add job individual
 * created on:28 july 2014
 * created by:Abhishek Tripathi
 */ 
  
   public function add_job()
  {
  	if($this->request->is('Post'))
	{
		
		if($this->Job->save($this->request->data))
		{
			$res=response_arr('Successfully added',0,$this->request->data["Job"]['customer_id']);
			echo json_encode($res);
			exit;
		}
	}
  }
  

}
