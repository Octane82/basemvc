<?php
//Registry

class Registry{

	private static $_instance;
	
	private $_storage;


	private function __construct(){}
	private function __clone(){}

	public static function getInstance(){
		if(!self::$_instance instanceof self){
			self::$_instance = new Registry();
		}
	return self::$_instance;	
	}
	
	/** 
	* 	Можно использовать магические методы 
	*	__get и __set
	* 	можем регистрировать переменные в любом месте
	*/
	public function __set($key, $val){
			$this->_storage[$key] = $val; 
		}
		
		public function __get($key){
			if(isset($this->_storage[$key])){
				return $this->_storage[$key];
			}
		return false;	
		}
		
}