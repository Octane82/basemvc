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

        $this->render('articletest', array('title'=>$title, 'vars'=>$vars));
	}


    public function two($id, $search){
        echo '<pre>'.print_r(__METHOD__, 1).'</pre>';
        echo '<pre>'.print_r(func_get_args(), 1).'</pre>';  //функция func_get_args принимает все переменные принимаемые функцией
        echo '<b>'.$id.'</b><br />';
        echo '<b>'.$search.'</b><br />';
    }


    public function post(){
        $post = new Post();
       // var_dump($post->post());

        $data = $post->post();

        $this->render('post', array('data'=>$data));

    }



}