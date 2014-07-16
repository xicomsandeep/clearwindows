<?php
App::uses('AppController', 'Controller');
/**
 * Customers Controller
 *
 * @property Customer $Customer
 */
class EventsController extends AppController {

/**
 * Purpose:add events
 * created on:7 july 2014
 * created by:Abhishek Tripathi
 */
  public function add()
  {
  	if($this->request->is('Post'))
	{
		
		if($this->Event->save($this->request->data))
		{
			
			$res=response_arr('Successfully added',0,$this->request->data);
			echo json_encode($res);
			exit;
		}
	}
  }
  
  /**
 * Purpose:list of events
 * created on:7 july 2014
 * created by:Abhishek Tripathi
 */
 
   public function event_list()
  {
  	if($this->request->is('Post'))
	{
		$events=array(); 
		$event_list=$this->Event->find('all',array('order' => array(
        'Event.created' => 'desc')));
        		
		if($event_list)
		{
			foreach($event_list as $event){
				$events[]=$event['Event'];
			}
		
		}
			$res=response_arr('Successfully added',0,$events);
			echo json_encode($res);
			exit;
	}
  }

 /**
 * Purpose:get event list after filter
 * created on:7 july 2014
 * created by:Abhishek Tripathi
 */  
  public function event_filter()
  {
  
	{
		$query=$this->request->data['keyword'];
		
		$cond_arr=array();
		$events=array();
		if(!empty($query)){
			
		  append_condition($cond_arr, 'Event.event_type', 'like', $query);
		  append_condition($cond_arr, 'Event.description', 'like', $query);
		$event_info=$this->Event->find('all',array('conditions'=>array('OR'=>$cond_arr),'order' => array(
        'Event.created' => 'desc')));
		}
		else{
			
			$event_info=$this->Event->find('all',array('order' => array(
        'Event.created' => 'desc')));
		}
		
		foreach($event_info as $event)
		{
			$events[]=$event['Event'];
		}
		$res=response_arr('Successfully added',0,$events);
			echo json_encode($res);
			exit;
	}
  }
  
  
}
