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


    /**
     * TODO: написать вывод ошибки в случае отсутсвия параметров функции в запросе
     * @param $price
     */
    public function post($price){
        $post = new Post();
        $data = $post->printpost($price);

        $this->render('post', array('data'=>$data));
     //   var_dump($_POST);
    }


    /**
     * Проверка получения данных методом POST из вида
     */
    public function request(){
        if(isset($_POST)){
            $msg = 'Post пришёл';
            $datapost = $_POST['testpost'];
        }
      //  $this->redirect('test/post/price/1500');
        $obj = new Post();
        $obj->change();

        $this->render('request', array('msg'=>$msg, 'datapost'=>$datapost));
    }




}