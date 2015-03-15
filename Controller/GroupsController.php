<?php

App::uses('UsersAppController', 'Users.Controller');

/**
 * Groups Controller
 *
 * @property Group $Group
 * @property PaginatorComponent $Paginator
 */
class GroupsController extends UsersAppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Group->recursive = 0;
        $this->set('groups', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Group->exists($id)) {
            $this->Session->setFlash(__('Inexistent group.'), 'Users.flash/error');
            return $this->redirect(array('action' => 'index'));
        }
        $options = array('conditions' => array('Group.' . $this->Group->primaryKey => $id));
        $group = $this->Group->find('first', $options);
        $group['Group']['permissions'] = unserialize($group['Group']['permissions']);
        $this->set('group', $group);
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {

            $this->request->data['Group']['permissions'] = serialize($this->request->data['Group']['permissions']);

            $this->Group->create();
            if ($this->Group->save($this->request->data)) {
                $this->Session->setFlash(__('The group has been saved.'), 'Users.flash/success');
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The group could not be saved. Please, try again.'), 'Users.flash/error');
            }
        }
    }

    /**
     * edit method
     *
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Group->exists($id)) {
            $this->Session->setFlash(__('Inexistent group.'), 'Users.flash/error');
            return $this->redirect(array('action' => 'index'));
        }
        if ($this->request->is(array('post', 'put'))) {

            $this->request->data['Group']['permissions'] = serialize($this->request->data['Group']['permissions']);
                    
            if ($this->Group->save($this->request->data)) {
                $this->Session->setFlash(__('The group has been saved.'), 'Users.flash/success');
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The group could not be saved. Please, try again.'), 'Users.flash/error');
            }
        } else {
            $options = array('conditions' => array('Group.' . $this->Group->primaryKey => $id));
            $this->request->data = $this->Group->find('first', $options);
            $this->request->data['Group']['permissions'] = unserialize($this->request->data['Group']['permissions']);
        }
    }

    /**
     * delete method
     *
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Group->id = $id;
        if (!$this->Group->exists()) {
            $this->Session->setFlash(__('Inexistent group.'), 'Users.flash/error');
            return $this->redirect(array('action' => 'index'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Group->delete()) {
            $this->Session->setFlash(__('The group has been deleted.'), 'Users.flash/success');
        } else {
            $this->Session->setFlash(__('The group could not be deleted. Please, try again.'), 'Users.flash/error');
        }
        return $this->redirect(array('action' => 'index'));
    }

}
