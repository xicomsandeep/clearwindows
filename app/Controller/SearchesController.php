<?php
App::uses('AppController', 'Controller');
/**
 * Customers Controller
 *
 * @property Customer $Customer
 */
class SearchesController extends AppController {


public function search_result($search_keyword){
	
	 $results = $this->Search->find('all',array(
	 
                    'conditions'=>array('OR'=>array('name LIKE '=> "%{$search_keyword}%",'email LIKE'=>"%{$search_keyword}%",'description LIKE'=>"%{$search_keyword}%")),
                ));
	debug($results);		

}
/**
	 * Purpose:delete search result on type basis
	 * created on:2 july 2014
	 * created by:Abhishek Tripathi
	 */

public function delete_result(){
    $this->loadModel('Customer');
	$this->loadModel('Job');
	$this->loadModel('Account');
	$id=$this->request->data['id'];
	$this->Search->id=$id;
	if($this->request->is('post'))
	{
		switch($this->request->data['type']){
			case 'Customer':$this->Customer->id=$id;
			                $this->Customer->delete();
			break;
			case 'Job':$this->Job->id=$id;
			           $this->Job->delete();
			break;
			case 'Account':$this->Account->id=$id;
			               $this->Account->delete();
			break;
			
		}
			$res = response_arr('Successfully Deleted', 0);
				echo json_encode($res);
				exit ;
	}
	
	
}


}
