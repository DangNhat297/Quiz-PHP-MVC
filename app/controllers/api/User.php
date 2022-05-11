<?php

namespace App\Controllers\API;

use App\Models\User as ModelsUser;
use PDOException;

class User extends BaseAPI{

    public function index(){
        // $sql = "SELECT id, name, email FROM users WHERE role_id = 0";
        // $users = ModelsUser::rawQuery($sql)->get();
        $users = ModelsUser::where('role_id', 2)->get();
        $this->response(['data' => $users]);
    }

    public function show($id){
        // $sql = "SELECT id, name, email FROM users WHERE id = $id";
        // $user = ModelsUser::rawQuery($sql)->first();
        $user = ModelsUser::where('id', $id)->first();
        $this->response($user);
    }

    public function destroy($id){
        try{
            ModelsUser::destroy($id);
            $this->response(['status' => 'success']);
        }catch(PDOException $e){    
            $this->response(['status' => 'error']);
        }
    }

}