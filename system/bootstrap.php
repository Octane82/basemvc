<?php
//bootstrap file

//подключаем файлы ядра
require_once SITE_PATH.'system/core/Registry.php';

//require_once SITE_PATH.'system/core/Request.php';
//require_once SITE_PATH.'system/core/Router.php';
require_once SITE_PATH.'system/core/BaseController.php';
//require_once SITE_PATH.'system/core/BaseModel.php';	

//*********
	require_once SITE_PATH.'application/controllers/TestController.php';

$registry = Registry::getInstance();
$registry->test = 'Hello world';

$ctrl = new TestController();
$ctrl->index();
echo '<pre>'.print_r($registry->newvar, 1).'</pre>';

//$req = new Request();
