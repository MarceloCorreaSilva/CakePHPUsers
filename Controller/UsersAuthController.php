<?php
App::uses('AppController', 'Controller');

class UsersAuthController extends AppController {
	public $helpers = array(
    	'Session'
  	);

	public $components = array(
      	'Session',
      	'Auth' => array(
          	'authenticate' => array(
              	'Form' => array(
                  	'fields' => array(
                 	 	'username' => 'email',
                	  	'password' => 'password'
                  	),
                  	'scope' => array(
                      	'User.status' => 1
                  	)
              	)
          	),
			'loginRedirect' => array('admin' => false, 'plugin' => false, 'controller' => '/'),
			'logoutRedirect' => array('admin' => false, 'plugin' => 'users', 'controller' => 'users', 'action' => 'login'),
			'authError' => 'Você não têm acesso a está página!',
			'authorize' => array('Controller')
      	)
  	);

	public function isAuthorized($user) {
		if (isset($user['group_id'])) {
			return true;
		} else {
			return false;
		}
		/*return true;*/
	}

	public function beforeFilter() {
		parent::beforeFilter();
		//$this->layout = "nepa_admin";

		$this->Auth->deny('*');
		$this->set('logged_in', $this->Auth->loggedIn());
		$this->set('current_user', $this->Auth->user());
		$this->Auth->flash['params']['class'] = 'alert alert-danger';
	}
}