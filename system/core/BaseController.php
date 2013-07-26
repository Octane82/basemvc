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
	


    // получить отренедеренный шаблон с параметрами $params
    function fetchPartial($template, $params = array()){
        $idController = Application::getInstance()->controller();   //текущий контроллер
        extract($params);
        ob_start();
        include SITE_PATH.'application/views/'.$idController.'/'.$template.'.php';
        return ob_get_clean();
    }

    // получить отренедеренный шаблон с параметрами $params для fetch()
    function getLayoutFile($template, $params = array()){
        extract($params);
        ob_start();
        include SITE_PATH.'application/views/'.$template.'.php';
        return ob_get_clean();
    }


    // вывести отренедеренный шаблон с параметрами $params
    function renderPartial($template, $params = array()){
        echo $this->fetchPartial($template, $params);
    }


    // получить отренедеренный в переменную $content layout-а
    // шаблон с параметрами $params
    function fetch($template, $params = array()){
        $content = $this->fetchPartial($template, $params);
        return $this->getLayoutFile('layouts/'.$this->layout, array('content' => $content));
    }


    // вывести отренедеренный в переменную $content layout-а
    // шаблон с параметрами $params
    function render($template, $params = array()){
        echo $this->fetch($template, $params);
    }






    //////////////////////////////////////////////////////////////
    /**
     *	Отображение вида с загрузкой layouts
     * @param name	название файла вида
     * @param vars	массив переменных, передаваемых в вид
     */
    /*	public function render($name, array $vars = null){
            $layoutfile = SITE_PATH.'application/views/layouts/'.$this->layout.'.php';
            $file = SITE_PATH.'application/views/'.$name.'.php';
            if(is_readable($file)){
                ob_start();
               // $content = file_get_contents($file);
                require($file);
                if(isset($vars)){
                    extract($vars);		//переводим массив $vars в переменные по значению
                }
                $vrs = 'iygitigtigt7iyg';
                $content = ob_get_contents();
                ob_end_clean();
                require($layoutfile);
              //  require($file);
                return true;
            }
            throw new exception('Vid otsuststvuet');
        }   */

    /**
     *	Отображение вида, без загрузки layouts
     * @param name	название файла вида
     * @param vars	массив переменных, передаваемых в вид
     */
    /*    public function renderPartial($name, array $vars = null){
            $file = SITE_PATH.'application/views/'.$name.'.php';
            if(is_readable($file)){
                if(isset($vars)){
                    extract($vars);		//переводим массив $vars в переменные по значению
                }
                require($file);
                return true;
            }
            throw new exception('Vid otsuststvuet');
        }   */






}