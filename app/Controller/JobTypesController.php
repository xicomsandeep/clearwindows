<?php
App::uses('AppController', 'Controller');
/**
 * Customers Controller
 *
 * @property Customer $Customer
 */
class JobTypesController extends AppController {

/**
 * Purpose:add job type
 * created on:4 august 2014
 * created by:Abhishek Tripathi
 */
 public function admin_add(){
 	
 	if($this->request->is('post'))
	{
		$this->JobType->save($this->request->data);
		$this->Session->setFlash(__('Job type added successfully'));
	    $this->redirect(array('action'=>'index'));
	}
	else{
		$this->Session->setFlash(__('Please try again'));
	}
	$view_title="Add job type";
	$this->set(compact('view_title'));
	$this->render('admin_edit');
	
 }

/**
 * Purpose:show list of job type
 * created on:4 august 2014
 * created by:Abhishek Tripathi
 */
 public function admin_index(){
     $cond_arr=array();
			        
			if(count($this->params->query))
            {
                    $srch_arr = $this->params->query;
                    if(!empty($srch_arr['name']))
                    {
                            append_condition($cond_arr, 'JobType.name', 'any_like', $srch_arr['name']);
                    }
            }
	 $job_type=$this->paginate('JobType',array($cond_arr));
	
	 $view_title="List of job type";
	 $this->set(compact('view_title','job_type'));
	 
	 
 }
 
 /**
* Purpose : FOR ADMIN TO MAKE ACTION DELETE for jobtype
* Created on : 4 july 2014
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
                                    $this->JobType->deleteAll(array('JobType.id' => $ids), true);

                                    $message = 'Deleted successfully.';
                            }
                            
                           

                            $this->Session->setFlash($message, 'flash_success');
                    }

                    $this->redirect($this->referer());
            }
    }
/**
 * Purpose:get all job Type list
 * created on:4 august 2014
 * created by:Abhishek Tripathi
 */

 public function job_type_list()
 {
 	$ro=array();
	$job_list=$this->JobType->find('all',array('fields'=>array('id','name')));
	 foreach($job_list as $list){
    	$ro[]=$list['JobType'];
    }
		$res=response_arr('Successfully added',0,$ro);
			echo json_encode($res);
			exit;
 }
}
