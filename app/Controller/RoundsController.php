<?php
App::uses('AppController', 'Controller');
/**
 * Customers Controller
 *
 * @property Customer $Customer
 */
class RoundsController extends AppController {

/**
 * Purpose:add customer information
 * created on:2 july 2014
 * created by:Abhishek Tripathi
 */
 public function add(){
 	if($this->request->is('Post'))
	{
		//debug($this->request->data);exit;
		if($this->Round->save($this->request->data))
		{
			
			$res=response_arr('Successfully added',0,$this->request->data);
			echo json_encode($res);
			exit;
		}
	}
 }
 
 /**
 * Purpose:job list in a round
 * created on:28 july 2014
 * created by:Abhishek Tripathi
 */
 
 public function round_in_job(){
 	$rounds=array();
	$this->Round->recursive=1;
	$round_list=$this->Round->find('all');
	foreach($round_list as $round){
		$rounds[]=array(
		  'name'=>$round['Round']['name'],
		  'count'=>count($round['Job'])
		);
	}
	
	$res=response_arr('Successfully added',0,$rounds);
			echo json_encode($res);
			exit;
 }
  

}
