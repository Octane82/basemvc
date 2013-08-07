<?php
//bootstrap file


//подключаем файлы ядра
require_once SITE_PATH.'system/core/Registry.php';
require_once SITE_PATH.'system/core/Request.php';
require_once SITE_PATH.'system/core/Router.php';

require_once SITE_PATH.'system/core/Application.php';

require_once SITE_PATH.'system/core/BaseController.php';
require_once SITE_PATH.'system/core/BaseModel.php';


//require_once SITE_PATH.'system/lib/DB.php';                   //можно явно подключить библиотеку работы с БД, или (см. ниже)


//Пути для подключения файлов скриптов
 set_include_path(get_include_path()                          //Функция несколько путей для include (замена базовой дирректории)
        .PATH_SEPARATOR.SITE_PATH.'application/models'
        .PATH_SEPARATOR.SITE_PATH.'system/lib');

//Автозагрузка классов
function customAutoload($class){
    require_once $class.'.php';
}

//Регистрация своего автозагрузчика
spl_autoload_register('customAutoload');


try{
    Router::route(new Request());
}catch (Exception $e){
    $host = $_SERVER['HTTP_HOST'];
    $errMsg = $e->getMessage();
    header("Location: http://$host/error/index/error/$errMsg");     //перенаправляем на контроллер ошибок
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