<?php

App::uses('AppController', 'Controller');
App::uses('File', 'Utility');
App::uses('ConnectionManager', 'Model');

class InstallController extends AppController {

    public $components = array('Session');
    
    public function install() {
        $this->layout = 'blank';
    }

    /**
     * Configure galleries and create mysql tables
     */
    public function configure() {
        $this->_configureDatabase();

        $this->Session->setFlash(__('Success! Plugin Users is now installed in your app.'), 'Users.flash/success');

        $this->redirect(
                array('controller' => 'users', 'action' => 'login', 'plugin' => 'users')
        );

        $this->render(false, false);
    }

    /**
     * Configure database to use this plugin
     */
    private function _configureDatabase() {
        try {
            $db = ConnectionManager::getDataSource('default');

            if (!$db->isConnected()) {
                throw new Exception("You need to connect to a MySQL Database to use this Plugin.");
            }

            /** Verify if the tables already exists */
            if (!$this->_checkTables($db->listSources())) {
                $this->_setupDatabase($db);
            }

            # Create config file
            $this->_createConfigFile();

            return;
        } catch (Exception $e) {
            $this->Session->setFlash($e->getMessage());
            $this->redirect('/');
        }
    }

    /**
     * @param $tables
     * @return bool
     */
    private function _checkTables($tables) {
//        return !!in_array('install', $tables);
        return !!in_array('groups', $tables) && !!in_array('users', $tables);
    }

    /**
     * Execute Config/cakegallery.sql to create the tables
     * Create the config File
     * @param $db
     */
    private function _setupDatabase($db) {
        # Execute the SQL to create the tables
        $sqlFile = new File(App::pluginPath('Users') . 'Config' . DS . 'Schema/users.sql', false);
        $db->rawQuery($sqlFile->read());
        $sqlFile->close();
    }

    /**
     * Create the config file copying the config.php.install file
     */
    private function _createConfigFile() {
        $destinationPath = App::pluginPath('Users') . 'config' . DS . 'config.php';

        if (!file_exists($destinationPath)) {
            $configFile = new File(App::pluginPath('Users') . 'config' . DS . 'config.php.install');

            $configFile->copy($destinationPath);
        }
    }

}
