<?php


class Post extends BaseModel{


    public function post(){

        $application = new Application(); //для чтения конфигурации приложения (можно переделать в конструктор вместо init)
        $application->init();
        $connection = $application->dbConnection();

        $sql="SELECT * FROM product";
        $resarr = $connection->query($sql);
        return $resarr;
    }


}