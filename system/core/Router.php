<?php
//Router file

class Router{

    /**
     * @param Request $request
     * @throws Exception
     *
     * TODO     Добавить исключения на возможное отсутствие метода и (параметров ???????)
     */
    public static function route(Request $request){

        $controller = $request->getController().'Controller';       //Получаем название контроллера из объекта request
        $method = $request->getMethod();                            //название метода ....
        $args = $request->getArgs();                                //аргументы

        $controllerFile = SITE_PATH.'application/controllers/'.$controller.'.php';      //Файл контроллера

        if(is_readable($controllerFile)){                   //Если существует файл контроллера
            require_once $controllerFile;                   //Подключаем его

            $controller = new $controller;                  //Создаём объект контроллера
            $method = (is_callable(array($controller, $method)))? $method : 'index';    //если есть метод получаем его

            if(!empty($args)){
                call_user_func_array(array($controller, $method), $args);   //вызываем контроллер и передаём аргументы в метод
            }else{
                call_user_func(array($controller, $method));                //вызываем контроллер без передачи аргументов
            }
            return;
        }

        throw new Exception('404 - '.$request->getController().' Not found');
    }

}