<?php
App::uses('AppModel', 'Model');
/**
 * Job Model
 *
 * @property User $User
 * @property Account $Account
 * @property Customer $Customer
 */
class Search extends AppModel {

  var $name = 'Search';
    var $useTable = 'searches';
    var $primaryKey = 'id';
    var $useDbConfig = 'default';


}
