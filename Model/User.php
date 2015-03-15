<?php

App::uses('AuthComponent', 'Controller/Component');
App::uses('UsersAppModel', 'Users.Model');

/**
 * User Model
 *
 * @property Group $Group
 */
class User extends UsersAppModel {

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'group_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'name' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            'validateFullName' => array(
                'rule' => array('validateFullName'),
                'message' => 'Por favor, digite seu nome completo (nome sobrenome).'
            )
        ),
        'email' => array(
            'email' => array(
                'rule' => array('email'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            'isUnique' => array(
                'rule' => 'isUnique',
                'message' => 'O email informado, já está em uso, por favor informe outro.'
            )
        ),
        'password' => array(
            'notEmpty' => array(
                'rule' => array('minLength', '6'),
                'message' => 'Informe uma senha com no minímo 6 caracteres',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        /* 'password' => array(
          'rule' => array('minLength', '8'),
          'message' => 'Mínimo de 8 caracteres'
          ), */
        'status' => array(
            'boolean' => array(
                'rule' => array('boolean'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
    );

    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Group' => array(
            'className' => 'Group',
            'foreignKey' => 'group_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

    /**
     * beforeSave associations
     *
     * @var boolean
     */
    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password'])) {
            $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
        }
        
        if (isset($this->data['User']['profile_image']['name'])) {
            $imagem = ($this->data['User']['profile_image']['name']) ? $this->data['User']['profile_image']['name'] : 'vazio';
            if ($imagem != 'vazio') {
                $imagem = parent::saveFile($this->data['User']['profile_image'], $this->data['User']['profile_image']['name'], '/img/users');
                if ($imagem) {
                    $this->data['User']['profile_image'] = strtolower(str_replace(" ", "-", $this->data['User']['profile_image']['name']));
                } else {
                    $this->data['User']['profile_image'] = strtolower(str_replace(" ", "-", $this->data['User']['profile_image']['name']));
                }
            } else {
                unset($this->data['User']['profile_image']);
            }
            parent::beforeSave($options);
        }

        return true;
    }

    /**
     * active
     *
     * @var Array
     */
    public function active( $id ) {
        $user = self::find('first', array('conditions' => array('User.id' => $id)));
        unset($user['User']['password']);
        $user['Group']['permissions'] = unserialize($user['Group']['permissions']);
        return $user;
    }

    function validateFullName($data = "") {
        $name = explode(" ", $data['name']);
        return count($name) > 1;
    }

}
