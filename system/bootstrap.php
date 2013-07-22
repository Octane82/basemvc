<?php
//bootstrap file

//подключаем файлы ядра
require_once SITE_PATH.'system/core/Registry.php';

require_once SITE_PATH.'system/core/Request.php';
require_once SITE_PATH.'system/core/Router.php';
require_once SITE_PATH.'system/core/BaseController.php';
require_once SITE_PATH.'system/core/ErrorController.php';
//require_once SITE_PATH.'system/core/BaseModel.php';	


try{
    Router::route(new Request());
}catch (Exception $e){
    $controller = new ErrorController();
    $controller->error($e->getMessage());
}