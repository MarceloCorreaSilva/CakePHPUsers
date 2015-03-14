<?php

App::uses('UsersAppController', 'Users.Controller');

/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends UsersAppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');

    /**
     * beforeFilter method
     *
     * @return void
     */
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('login', 'register'); // Permitindo que os usuários se registrem
    }

    /**
     * login method
     *
     * @return void
     */
    public function login() {
        $this->layout = 'login';
        $this->set('title_for_layout', __('Users Login'));

        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $this->Session->setFlash(__('The user is valid'), 'Users.flash/success');
                $this->redirect($this->Auth->redirect());
            } else {
                $this->Session->setFlash(__('Invalid username or password, try again'), 'Users.flash/error');
            }
        }
    }

    /**
     * logout method
     *
     * @return void
     */
    public function logout() {
        $this->redirect($this->Auth->logout());
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->User->recursive = 0;
        $this->set('users', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
        $this->set('user', $this->User->find('first', $options));
    }
    
    public function profile($id = null) {
        $this->layout = 'profile';
        if ($this->Auth->user('id') == $id) {
            if ($this->request->is(array('post', 'put'))) {
                if ($this->User->save($this->request->data)) {
                    $this->Session->setFlash(__('The user has been saved.'), 'Users.flash/success');
                    return $this->redirect(array('action' => 'profile', $id));
                } else {
                    $this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'Users.flash/error');
                }
            } else {
                $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
                $this->request->data = $this->User->find('first', $options);
            }
            $groups = $this->User->Group->find('list');
            $this->set(compact('groups'));
        } else {
            return $this->redirect(array('action' => 'index'));
        }
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved.'), 'Users.flash/success');                
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'Users.flash/error');
            }
        }
        $groups = $this->User->Group->find('list');
        $this->set(compact('groups'));
    }

    public function register() {
        $this->layout = 'login';
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved.'), 'Users.flash/success');
                return $this->redirect(array('action' => 'login'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'Users.flash/error');
            }
        }
        $groups = $this->User->Group->find('list');
        $this->set(compact('groups'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved.'), 'Users.flash/success');
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'Users.flash/error');
            }
        } else {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $this->request->data = $this->User->find('first', $options);
        }
        $groups = $this->User->Group->find('list');
        $this->set(compact('groups'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->User->delete()) {
            $this->Session->setFlash(__('The user has been deleted.'), 'Users.flash/success');
        } else {
            $this->Session->setFlash(__('The user could not be deleted. Please, try again.'), 'Users.flash/error');
        }
        return $this->redirect(array('action' => 'index'));
    }

}
