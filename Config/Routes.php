<?php 
Router::connect(
    '/users/login',
    array( 'controller' => 'users', 'action' => 'login', 'plugin' => 'users' )
);

Router::connect(
    '/users/logout',
    array( 'controller' => 'users', 'action' => 'logout', 'plugin' => 'users' )
);

Router::connect(
    '/users/',
    array( 'controller' => 'users', 'action' => 'index', 'plugin' => 'users' )
);

Router::connect(
    '/users/add',
    array( 'controller' => 'users', 'action' => 'add', 'plugin' => 'users' )
);

Router::connect(
    '/users/register',
    array( 'controller' => 'users', 'action' => 'register', 'plugin' => 'users' )
);

Router::connect(
    '/users/view/:user_id',
    array( 'controller' => 'users', 'action' => 'view', 'plugin' => 'users' ),
    array( 'named' => array( 'user_id' => array('user_id') ), 'pass' => array('user_id') )
);

Router::connect(
    '/users/profile/:user_id',
    array( 'controller' => 'users', 'action' => 'profile', 'plugin' => 'users' ),
    array( 'named' => array( 'user_id' => array('user_id') ), 'pass' => array('user_id') )
);

Router::connect(
    '/users/edit/:user_id',
    array( 'controller' => 'users', 'action' => 'edit', 'plugin' => 'users' ),
    array( 'named' => array( 'user_id' => array('user_id') ), 'pass' => array('user_id') )
);
