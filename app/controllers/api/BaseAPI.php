<?php

namespace App\Controllers\API;

class BaseAPI{

    protected $request;

    public function __construct()
    {
        $this->request = $_SERVER['REQUEST_METHOD'];
    }

    protected function response($data = null, $http_response_code = 200)
    {
        echo json_encode($data);
        http_response_code($http_response_code);
    }

    public function notfound(){
        $this->response(null, 404);
    }

}