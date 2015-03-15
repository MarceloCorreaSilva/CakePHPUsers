<?php

App::uses('AppController', 'Controller');

class UsersAuthController extends AppController {
    //public $uses = array('User');
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
            'loginRedirect' => array('admin' => false, 'plugin' => false, 'controller' => 'users', 'action' => 'index'),
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
    }

    public function beforeFilter() {
        parent::beforeFilter();
        
        if (!$this->_checkConfigFile()) {
            $this->redirect(array('plugin' => 'users', 'controller' => 'install', 'action' => 'install'));
        }
        
        $this->layout = "default";

        /* Auth setings */
        $this->Auth->deny('*');
        $this->set('logged_in', $this->Auth->loggedIn());
        $this->set('current_user', $this->Auth->user());
        //$this->set('current_user', $this->User->active($this->Auth->user('id')));
        $this->Auth->flash['params']['class'] = 'alert alert-danger';
    }

    public function beforeRender() {
        $this->_setErrorLayout();
    }

    public function _setErrorLayout() {
        if ($this->name == 'CakeError') {
            $this->layout = 'errors';
        }
    }

    /**
     * Check if plugin config file exists
     * @return bool
     */
    private function _checkConfigFile() {
        return !!file_exists(App::pluginPath('Users') . 'Config' . DS . 'config.php');
    }
}
