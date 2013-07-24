<?php
//main application file

class Application{

    public $hostname = '';

    public $db_login = '';

    public $db_password = '';

    public $db_name = '';



 /*   public function _construct(){
    $config = include  SITE_PATH.'system/config/config.php';

        $this->hostname     = $config['database']['hostname'];
        $this->db_login     = $config['database']['login'];
        $this->db_password  = $config['database']['password'];
       // $this->db_name      = $config['database']['dbname'];
        $this->db_name = 'sqltest';
    } */


    public function init(){
        $config = include  SITE_PATH.'system/config/config.php';

        $this->hostname     = $config['database']['hostname'];
        $this->db_login     = $config['database']['login'];
        $this->db_password  = $config['database']['password'];
        $this->db_name      = $config['database']['dbname'];
    }



    public function setHostname(){
        return $this->hostname;
    }

    public function setDbLogin(){
        return $this->db_login;
    }

    public function setDbPassword(){
        return $this->db_password;
    }

    public function setDbName(){
        return $this->db_name;
    }


}