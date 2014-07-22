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
 
  

}
