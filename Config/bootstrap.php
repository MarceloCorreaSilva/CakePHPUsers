<?php

// Definindo idioma da aplicação
Configure::write('Config.language', 'pt-BR');

// Adicionando o caminho do locale
App::build(array('Locale' => array(CakePlugin::path('Users') . 'Locale' . DS)));