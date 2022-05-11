<?php
namespace App\Controllers;
use App\Models\User;
use Core\Session;

class LoginController extends BaseController{

    // public function __construct(){
    //     if(isLogging()) header('location: ' . route(''));
    // }

    public function index(){
        $this->render('Login');
    }
    
    public function logout(){
        Session::destroy();
        header('location: ' . route('dang-nhap'));
    }

}

?>