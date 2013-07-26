<?php
//main application file

class Application{
    /**
     * @var string
     *  Application  -- это базовый класс приложения
     * Приложение служит в качестве глобального контекста
     */


    private static $_instance;


    public $connection;         //PDO подключение к БД

    public $sql;                //Выражение SQL


    private function __construct(){}
    private function __clone(){}

    /**
     * @return Application|string       singleton pattern
     */
    public static function getInstance(){
        if(!self::$_instance instanceof self){
            self::$_instance = new Application();
        }
        return self::$_instance;
    }


    /**
     * @return mixed|string     возвращает название контроллера
     */
    function controller(){
        $request = new Request();
        return $request->getController();
    }

    /**
     * @return $this        при помощи return $this создаём цепочку вызовов методов
     */
    public function db(){
       $config = include  SITE_PATH.'system/config/config.php';
       $host = $config['database']['hostname'];
       $db = $config['database']['dbname'];
       $user = $config['database']['login'];
       $pass = $config['database']['password'];

       $this->connection = new PDO("mysql:host=$host; dbname=$db", $user, $pass);
       return $this;
    }

    /**
     * @param $sql      выражение sql
     * @return $this
     */
    public function createCommand($sql){
        $this->sql = $sql;
        return $this;
    }

    /**
     * @return mixed    возвращаем массив выборки SELECT
     */
    public function query(){
        $resarr = $this->connection->query($this->sql);          //$con->query($sql);
        return $resarr;
    }



}