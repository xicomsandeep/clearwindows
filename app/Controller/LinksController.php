<?php
App::uses('AppController', 'Controller');
/**
 * Customers Controller
 *
 * @property Customer $Customer
 */
class LinksController extends AppController {
	
	public function add_link(){
		if($this->request->is('post')){
			$link=array('Link'=>array(
			'relate_to'=>$this->request->data['relate_to_id'],
			'relate_from'=>$this->request->data['relate_from_id'],
			'relate_to_model'=>$this->request->data['relate_to_model'],
			'relate_from_model'=>$this->request->data['relate_from_modal'],
			'subject'=>$this->request->data['subject'],
			'status'=>0,
			'icon'=>$this->request->data['icon']
			));
		 if($this->Link->save($link)){
		 	$res=response_arr('Successfully added',0);
			echo json_encode($res);
			exit;
		 }	
		 else{
		 	$res=response_arr('Please try again',1);
			echo json_encode($res);
			exit;
		 }
		}
	}
	 
	public function link_list(){
		$this->loadModel('Customer');
		$this->loadModel('Job');
		$this->loadModel('Event');
		$link_list=array();
		$response=array();
		if($this->request->is('post')){
			$id=$this->request->data['id'];
			$model=$this->request->data['model'];
			$list=$this->Link->find('all',array('conditions'=>array(
			'OR'=>array(
			  array('AND'=>array('relate_from'=>$id,'relate_from_model'=>$model)),
			  array('AND'=>array('relate_to'=>$id,'relate_to_model'=>$model))
			  )
			)));
			//debug($list);exit;
			//debug($this->Link->getDataSource()->getLog(FALSE,false));exit;
			foreach($list as $li){
				if($li['Link']['relate_from']==$id && $li['Link']['relate_from_model']==$model){
				   $link=array(
				   'link_from'=>$li['Link']['relate_to'],
				   'link_model'=>$li['Link']['relate_to_model']
				    );	
				}
                else{
                	$link=array(
                   'link_from'=>$li['Link']['relate_from'],
				   'link_model'=>$li['Link']['relate_from_model']
				    );	
                }
				$response[]=$link;
			}
             foreach($response as $rep){
             	$id=$rep['link_from'];
				$model=$rep['link_model'];
				
             	switch($model){
					case 'Customer':$this->Customer->recursive=-1;
					                $cus=$this->Customer->findById($id); 
					                $link_list[]=array(
									'link_to'=>$cus['Customer']['first_name'].''.$cus['Customer']['last_name'], 
									'link_to_id'=>$cus['Customer']['id'],
									'link_to_icon'=>'<i class="glyphicon glyphicon-user"></i>'
									);  
						break;
                   case	'Job':$this->Job->recursive=-1;
				               $cus=$this->Job->findById($id); 
					                $link_list[]=array(
									'link_to'=>$cus['Job']['subject'], 
									'link_to_id'=>$cus['Job']['id'],
									'link_to_icon'=>'<i class="glyphicon glyphicon-briefcase"></i>'
									);   
						break;
                  case 'Event':	$this->Event->recursive=-1;
				               $cus=$this->Event->findById($id); 
					                $link_list[]=array(
									'link_to'=>$cus['Event']['event_type'], 
									'link_to_id'=>$cus['Event']['id'],
									'link_to_icon'=>'<i class="glyphicon glyphicon-star-empty"></i>'
									);   
						break;						
             	}
             }
			 
			//debug($link_list);
			
			$res=response_arr('Successfully added',0,$link_list);
			echo json_encode($res);
			exit;
		}
	}
	
	
}


?>