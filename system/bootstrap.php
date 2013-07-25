<?php
//bootstrap file

//подключаем файлы ядра


require_once SITE_PATH.'system/core/Registry.php';
require_once SITE_PATH.'system/core/Request.php';
require_once SITE_PATH.'system/core/Router.php';

require_once SITE_PATH.'system/core/Application.php';

require_once SITE_PATH.'system/core/BaseController.php';
require_once SITE_PATH.'system/core/ErrorController.php';
require_once SITE_PATH.'system/core/BaseModel.php';


//Автозагрузка моделей
function __autoload($class){
    require_once SITE_PATH.'application/models/'.$class.'.php';
}


try{
    Router::route(new Request());
}catch (Exception $e){
    $controller = new ErrorController();
    $controller->error($e->getMessage());
}


///////////////////////////////////////////

/*
require_once SITE_PATH.'application/models/Post.php';
$post = new Post();
var_dump($post->post());    */


//TODO
/*
Здесь обычно подключаются дополнительные модули, реализующие различный функционал:
	> аутентификацию
	> кеширование
	> работу с формами
	> абстракции для доступа к данным
	> ORM
	> Unit тестирование
	> Benchmarking
	> Работу с изображениями
	> Backup
	> и др.
*/