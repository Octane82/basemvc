<?php

class TestController extends BaseController{

	public function index(){
	echo '<pre>'.print_r($this->_registry->test, 1).'</pre>';
	//echo "Im test controller";
	$this->_registry->newvar = 'Hello from TEST controller';
	
	
	$vars['title'] = 'Dynamic title';
	$vars['header'] = 'SUPER HEADER';
	$this->render('first', $vars);
	}

}