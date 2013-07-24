<?php


abstract class BaseModel{



    public function __construct(){
      $application = new Application(); //для чтения конфигурации приложения (можно переделать в конструктор вместо init)
      $application->init();


        $connect=mysql_connect($application->setHostname(), $application->setDbLogin(), $application->setDbPassword()) or die(mysql_error());
        if(!$connect)
            echo "<h1>Не могу выполнить запрос</h1>";

        mysql_select_db($application->setDbName(),$connect) or die(mysql_error());

        mysql_query("SET NAMES 'utf8'");           //Установка кодировки UTF8 для русского языка
        mysql_query("SET CHARACTER SET 'utf8'");

    }

}