<?php


class Session{

    public static function init(){
        session_start();		//@session_start();	????????
    }

    public static function set($key, $value){
        $_SESSION[$key] = $value;
    }

    public static function get($key){
        return $_SESSION[$key];
    }

    public static function destroy(){
        session_destroy();
    }

}

/* --------------------------------------------------------
В панели управления в __construct()
Session::init();
 $logged = Session::get('loggedIn');
	if($logged == false){
		Session::destroy();
		header("Location: login");
		exit;
	}


	В login.php
	установка сессии Session::set('LoggedIn', true);
						header("Location: dashboard");
-----------------------------------------------------------   */