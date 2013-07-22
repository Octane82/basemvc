<?php
//Error Controller file

class ErrorController extends BaseController{

    public function error($message = 'No information about the error '){
        echo '<pre>'.print_r($message, 1).'</pre>';
    }
}