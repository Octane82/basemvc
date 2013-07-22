<?php

class TestController extends BaseController{



	public function index(){
	echo '<pre>'.print_r($this->_registry->test, 1).'</pre>';
	//echo "Im test controller";
	$this->_registry->newvar = 'Hello from TEST controller';
	
	
//	$vars['title'] = 'Dynamic title';
//	$vars['header'] = 'SUPER HEADER';
        $vars = array('one', 'two', 'three');
        $title = 'Super mega title';
//	$this->render('article', $vars);
        //$this->renderPartial('article');
        $this->render('article', array('title'=>$title, 'vars'=>$vars));
	}


    public function two($var){
        echo '<pre>'.print_r(__METHOD__, 1).'</pre>';
        echo '<pre>'.print_r(func_get_args(), 1).'</pre>';  //функция func_get_args принимает все переменные принимаемые функцией
        echo '<b>'.$var.'</b>';
    }

}