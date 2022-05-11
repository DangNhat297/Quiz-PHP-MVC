<?php
namespace App\Controllers;

use App\Models\Quiz;
use App\Models\Subject;
use App\Models\User;

class DashboardController extends BaseController{

    public function index(){
        // $countStudent = User::rawQuery('SELECT * FROM users INNER JOIN roles ON users.role_id = roles.id AND roles.id = 2')->execute()->rowCount();
        $countStudent = User::join('roles','users.role_id', '=', 'roles.id')->where('roles.id', 2)->count();
        $countSubject = Subject::count();
        $countQuiz = Quiz::count();
        // require_once VIEW_PATH . '/Dashboard.php';
        $this->render('dashboard', [
            'countStudent'  => $countStudent,
            'countSubject'  => $countSubject,
            'countQuiz'     => $countQuiz
        ]);
    }    

}

?>