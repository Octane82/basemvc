<?php
//BaseController

abstract class BaseController{

    public $layout = 'main';

	protected $_registry;




	/**
	*	Регистрируем класс BaseController
	*/
	public function __construct(){
		$this->_registry = Registry::getInstance();
	}
	

    /**
     * получить отренедеренный шаблон с параметрами $params
     * @param $template
     * @param array $params
     * @return string
     */
    function fetchPartial($template, $params = array()){
        $idController = Application::getInstance()->controller();   //текущий контроллер
        extract($params);
        ob_start();
        include SITE_PATH.'application/views/'.$idController.'/'.$template.'.php';
        return ob_get_clean();
    }


    /**
     * получить отренедеренный шаблон с параметрами $params для fetch()
     * @param $template
     * @param array $params
     * @return string
     */
    function getLayoutFile($template, $params = array()){
        extract($params);
        ob_start();
        include SITE_PATH.'application/views/'.$template.'.php';
        return ob_get_clean();
    }


    /**
     * вывести отренедеренный шаблон с параметрами $params
     * @param $template
     * @param array $params
     */
    function renderPartial($template, $params = array()){
        echo $this->fetchPartial($template, $params);
    }


    /**
     * получить отренедеренный в переменную $content layout-а
     *  шаблон с параметрами $params
     * @param $template
     * @param array $params
     * @return string
     */
    function fetch($template, $params = array()){
        $content = $this->fetchPartial($template, $params);
        return $this->getLayoutFile('layouts/'.$this->layout, array('content' => $content));
    }


    /**
     * вывести отренедеренный в переменную $content layout-а
     *  шаблон с параметрами $params
     * @param $template
     * @param array $params
     */
    function render($template, $params = array()){
        echo $this->fetch($template, $params);
    }

    /**
     * Метод перенаправляет на другую страницу
     * @param string $path      путь 'controller/action'
     */
    function redirect($path = ''){
        $hostname = $_SERVER['HTTP_HOST'];
        header("Location: http://$hostname/$path");
    }


}