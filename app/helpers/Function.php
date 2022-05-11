<?php

use Core\Session;

function route($url){
    return ROOT_URL . '/' . $url;
}

function isLogging(){
    if(Session::get('user')) return true;
    return false;
}

function isAdmin(){
    if(isLogging() && Session::get('user')['role_id'] == 1) return true;
    return false;
}