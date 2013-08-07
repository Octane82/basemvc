<?php


class ErrorController extends BaseController{


    public function index($error = 'Неизвестная ошибка'){
        $this->render('error', array('error'=>$error));
    }

}