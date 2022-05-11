<?php

namespace App\Controllers\API;

use App\Helpers\Helper;
use App\Models\User;
use PDOException;
class Register extends BaseAPI{  

    public function handle(){
        $errors = [];
        $data = (object)$_POST;
        $file = (object)$_FILES['avatar'];
        $avatar = 'default.jpg';
        $userExist = User::where('email', $data->email)->exists();
        // var_dump($userExist);
        // die();
        if($userExist){
            $errors['email'] = 'Email đã tồn tại trên hệ thống';
        }
        if($data->password != $data->confirm_password){
            $errors['confirm_password'] = 'Xác nhận mật khẩu không đúng'; 
        }
        if($file->size > 0){
            $fileExtension = pathinfo($file->name, PATHINFO_EXTENSION);
            $avatar = "avatar" . Helper::randomStr() . '.' . $fileExtension;
        }
        if(count($errors) == 0){
            try{
                User::create([
                    'name'      => Helper::handleField($data->fullname),
                    'email'     => $data->email,
                    'password'  => password_hash($data->password, PASSWORD_BCRYPT),
                    'avatar'    => $avatar,
                    'role_id'   => 2
                ]);
                return $this->response(['status' => 'success']);
            }catch(PDOException $e){
                return $this->response(['status' => 'error']);
            }
        }
        return $this->response(['status' => 'error', 'message' => $errors]);
    }

}