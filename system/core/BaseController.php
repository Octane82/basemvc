<?php
//BaseController

abstract class BaseController{

	protected $_registry;

	/**
	*	Регистрируем класс BaseController
	*/
	public function __construct(){
		$this->_registry = Registry::getInstance();
		
	}
	
	/**
	*	Отображение вида
	* @param name	название файла вида
	* @param vars	массив переменных, передаваемых в вид
	*/
	public function render($name, array $vars = null){
		$file = SITE_PATH.'application/views/'.$name.'.php';
		if(is_readable($file)){
			if(isset($vars)){
				extract($vars);		//переводим массив $vars в переменные по значению
			}	
			require($file);
			return true;
		}
		throw new exception('Vid otsuststvuet');
	}
	

}