<?php
//main application file

class Application{
    /**
     * @var string
     *  Application  -- это базовый класс приложения
     * Приложение служит в качестве глобального контекста
     */


    private static $_instance;

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


}