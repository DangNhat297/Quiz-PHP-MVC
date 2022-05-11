<?php

namespace App\Controllers;

use App\Models\Quiz;
use App\Models\Subject;

class HomeController extends BaseController{

    public function __construct(){
        // if(!isLogging()) header('location: ' . route('dang-nhap'));
        if(isAdmin()) header('location: ' . route('quan-tri'));
    }

    public function index(){
        // $subjects = Subject::rawQuery("SELECT subjects.*, users.name as author_name FROM subjects INNER JOIN users ON subjects.author_id = users.id")->get();
        $subjects = Subject::select('subjects.*', 'users.name as author_name')
                            ->join('users', 'subjects.author_id', '=', 'users.id')
                            ->get();
        $this->render('home', ['subjects' => $subjects]);
    }

}