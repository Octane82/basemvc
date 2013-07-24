<?php
//Request class file

class Request{

    private $_controller;

    private $_method;

    private $_args;


    public function __construct(){
        $parts = explode('/', $_SERVER['REQUEST_URI']);          //Разбиваем адрес URI по слэшу на части
        $parts = array_filter($parts);

        $this->_controller = ($c = array_shift($parts))? $c : 'index';      //Присваиваем свойству название контроллера
        $this->_method = ($c = array_shift($parts))? $c : 'index';           //Присваиваем свойству название метода
       // $this->_args = (isset($parts[0]))? $parts : array();
        if(!empty($parts)){
            $keys = $values = array();
            for($i=0, $cnt=count($parts); $i<$cnt; $i++){
                if($i%2 == 0)
                 //Чётное = ключ(параметр)
                $keys[] = $parts[$i];
                else
                //Значение параметра
                $values[] = $parts[$i];
            }
            $this->_args = array_combine($keys, $values);
        }else
            $this->_args = array();


    }


    public function getController(){
        return $this->_controller;
    }

    public function getMethod(){
        return $this->_method;
    }

    public function getArgs(){
        return $this->_args;
    }

}