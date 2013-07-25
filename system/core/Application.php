<?php
//main application file

class Application extends Request{
    /**
     * @var string
     *  Application  -- это базовый класс приложения
     * Приложение служит в качестве глобального контекста
     */


    public $connection;         //PDO подключение к БД



    /**
     * Инициализация подключения к БД
     */
    public function init(){
        $config = include  SITE_PATH.'system/config/config.php';

        $host = $config['database']['hostname'];
        $db = $config['database']['dbname'];
        $user = $config['database']['login'];
        $pass = $config['database']['password'];

        $this->connection = new PDO("mysql:host=$host; dbname=$db", $user, $pass);
    }



    /**
     * @return mixed|string     возвращает название контроллера
     */
    public function idController(){
        return $this->getController();
    }

    public function dbConnection(){
        return $this->connection;
    }


}