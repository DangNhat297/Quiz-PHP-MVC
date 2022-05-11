<?php
namespace App\Controllers;

use App\Helpers\Helper;
use App\Models\Subject;
use Core\Session;

class SubjectController extends BaseController{

    public function list(){
        $this->render('ListSubject');
    }

    public function create(){
        $this->render('AddSubject');
    }


}

?>