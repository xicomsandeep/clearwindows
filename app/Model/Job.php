<?php
App::uses('AppModel', 'Model');
/**
 * Job Model
 *
 * @property User $User
 * @property Account $Account
 * @property Customer $Customer
 */
class Job extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
    public $contain=array(
		'User'=>array(
		    'fields'=>array(
		          'first_name',
		          'last_name',
		          'id'
		        )
		),
	    'Customer'=>array(
		     'fields'=>array(
			     'first_name',
			     'last_name',
			     'id'
			   )
		  )  
		); 
 
 
	public $validate = array(
		'id' => array(
			'naturalnumber' => array(
				'rule' => array('naturalnumber'),
			),
		),
		
		'description' => array(
			'notempty' => array(
				'rule' => array('notempty'),
			),
		),
	);
	
	/**Purpose: get all job information 
	 * created on:8 july 2014
	 * created by:Abhishek Tripathi
	 */
	public function get_all($id=null)
	{
		$condition=array();    
		if(isset($id)){
			$condition=array('AND'=>array(
			 'Job.customer_id'=>$id,
			
			));
		} 
		$this->recursive=2;  
		$jobs=$this->find('all',array('conditions'=>$condition,'fields'=>array('id','subject','description','created'),'contain'=>$this->contain,'order' => array(
        'Job.created' => 'desc'
    )));
		return $jobs;
	}
	
	/**Purpose: get all job information on filter 
	 * created on:8 july 2014
	 * created by:Abhishek Tripathi
	 */
	 public function get_data_filter($keyword=null)
	 {
	 	$conditions=array();
		if(isset($keyword))
		{
			 append_condition($conditions, 'Job.subject', 'any_like', $keyword);
			 append_condition($conditions, 'Job.description', 'any_like', $keyword);
		}
		//debug($conditions);exit;
		$jobs=$this->find('all',array('conditions'=>array('OR'=>$conditions),'fields'=>array('id','subject','description','created'),'contain'=>$this->contain,'order' => array(
        'Job.created' => 'desc')));
		return $jobs;
	 }
	 
	 public function get_detail($id=null)
	 {
	 	$condition=array();    
		if(isset($id)){
			$condition=array(
			 'Job.id'=>$id
			);
		} 
		$this->recursive=2;  
		$jobs=$this->find('all',array('conditions'=>$condition,'fields'=>array('id','subject','description','created'),'contain'=>$this->contain,'order' => array(
        'Job.created' => 'desc')));
		return $jobs;
	 }
	 
	 public function get_all_task(){
		$condition=array();    
		
			$condition=array('AND'=>array(
			 'Job.task '=>1,
			 'Job.cost '=>0
			));
	
		$this->recursive=2;  
		$jobs=$this->find('all',array('conditions'=>$condition,'fields'=>array('id','subject','description','created'),'contain'=>$this->contain,'order' => array(
        'Job.created' => 'desc'
    )));
		return $jobs;	
	 }



	// aftersave function for manage event log-----------------------
	public function afterSave($created,$options = array()){
	    $obj = ClassRegistry::init('Event');
		$customer = ClassRegistry::init('Customer');
		$customer_detail=$this->Customer->find('first',array('conditions'=>array('Customer.id'=>$this->data['Job']['customer_id']),'fields'=>array('first_name','last_name')));
		$event=array('Event'=>array(
		'event_type'=>($this->data['Job']['cost']==0)?"Add Task":"Add Job",
		'customer_id'=>$this->data['Job']['customer_id'],
		'customer_name'=>$customer_detail['Customer']['first_name'].' '.$customer_detail['Customer']['last_name'],
		'description'=>$this->data['Job']['subject'],
		'job_id'=>$this->getLastInsertID()
		));
		$obj->save($event);
		//debug($this->data['Job']['round_id']);exit;
		if(!empty($this->data['Job']['round_id'])){
		$schedule=ClassRegistry::init('Schedule');
		$data=array('Schedule'=>array(
		'round_id'=>$this->data['Job']['round_id'],
		'job_id'=>$this->getLastInsertID(),
		'round_position'=>$this->data['Job']['round_position']
		));
		$schedule->save($data);
		}
	}
	
	// beforedelete function for manage event log---------------------
	public function beforeDelete($cascade = true){
		
		$job=$this->find('first',array('conditions'=>array('Job.id'=>$this->id)));
		$customer = ClassRegistry::init('Customer');
		$customer_detail=$this->Customer->find('first',array('conditions'=>array('Customer.id'=>$job['Job']['customer_id']),'fields'=>array('first_name','last_name')));
		
		 $obj = ClassRegistry::init('Event');
		$event=array('Event'=>array(
		'event_type'=>($job['Job']['cost']==0)?"Delete Task":"Delete Job",
		'customer_id'=>$job['Job']['customer_id'],
		'user_id'=>$job['Job']['user_id'],
		'description'=>$job['Job']['subject'],
		'customer_name'=>$customer_detail['Customer']['first_name'].' '.$customer_detail['Customer']['last_name'],
		));
		$obj->save($event);
		
	}

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
		),
		'Customer' => array(
			'className' => 'Customer',
			'foreignKey' => 'customer_id',
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Account' => array(
			'className' => 'Account',
			'foreignKey' => 'job_id',
			'dependent' => true,
		),
		'Schedule' => array(
			'className' => 'Schedule',
			'foreignKey' => 'job_id',
			'dependent' => true,
		)
		
	);

}
