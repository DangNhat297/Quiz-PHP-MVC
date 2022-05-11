<?php

namespace App\Controllers\API;
use Core\Session;
use App\Models\User;
class Login extends BaseAPI{

    public function handle(){
        if($this->request == 'POST'){
            $data = (object)$_POST;
            $errors = [];
            $email = $data->email;
            $password = $data->password;
            $user = User::where('email', $email)->first();
            $remember = $data->remember;
            if(!$user){
                $errors['email'] = 'Tài khoản không tồn tại trên hệ thống';
            } else if(!password_verify($password, $user->password)){
                $errors['password'] = 'Mật khẩu không chính xác';
            }
            if(count($errors) == 0){
                Session::set('user', [
                    'id'        => $user->id,
                    'email'     => $user->email,
                    'avatar'    => $user->avatar,
                    'role_id'   => $user->role_id
                ]);
                if($remember != ''){
                    setcookie('email', $email, time() + 86400, "/");
                    setcookie('password', $password, time() + 86400, "/");
                    setcookie('remember', 'checked', time() + 86400, "/");
                } else {
                    setcookie('email', "", time()-360, "/");
                    setcookie('password', "", time()-360, "/");
                    setcookie('remember', "", time()-360, "/");
                }
                return $this->response(['status' => 'success'], 200);
            } 
            return $this->response([
                'status' => 'error',
                'message'=> $errors
            ], 401);
        }
        return $this->notfound();
    }

}