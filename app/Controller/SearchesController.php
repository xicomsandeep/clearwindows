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


}
