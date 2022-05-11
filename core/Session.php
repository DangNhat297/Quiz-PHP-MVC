<?php 

namespace Core;

class Session{
    // session start
	public static function init(){
		if(!isset($_SESSION)){
            session_start();
        }
	}

    // set value session
	public static function set($key,$val){
		$_SESSION[$key] = $val;
	}
    // get value session
	public static function get($key){
		if(isset($_SESSION[$key])){
			return $_SESSION[$key];
		}else{
			return false;
		}
	}
	// check isset session
	public static function issetSession($key){
		if(isset($_SESSION[$key])){
			return true;
		} else {
			return false;
		}
	}
    // destroy session
	public static function destroy(){
		session_destroy();
	}
    // unset session
	public static function unset($key){
		unset($_SESSION[$key]);
	}
    // set flash
    public static function flash($key, $value){
        $_SESSION['flash'][$key] = $value;
    }
    // unset flash session
    public static function unsetFlash(){
        if(self::issetSession('flash')){
            self::unset('flash');
        }
    }
    public static function getFlash($key){
        if(isset($_SESSION['flash'][$key])){
            return $_SESSION['flash'][$key];
        }
        return false;
    }

}
?>