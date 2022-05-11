<?php
require_once './vendor/autoload.php';
require_once './commons/DB.php';
$url = isset($_GET['url']) ? strtolower($_GET['url']) : "/";

use Core\Session;
Session::init();

\App\Helpers\Route::run($url);
// switch ($url) {

//     # Dinh nghia API

//     case 'api/login':
//         $api = new Login();
//         $api->handle();
//         break;
//     case 'api/register':
//         $api = new Register();
//         $api->handle();
//         break;
//     case 'api/subject':
//         $api = new Subject();
//         if(isset($_GET['id'])){
//             $id = $_GET['id'];
//             switch($request){
//                 case 'GET': 
//                     $api->show($id);
//                     break;
//                 case 'POST':
//                     $api->update($id);
//                     break;
//                 case 'DELETE':
//                     $api->destroy($id);
//                     break;
//             }
//         } else {
//             switch($request){
//                 case 'GET':
//                     $api->index();
//                     break;
//                 case 'POST':
//                     $api->create();
//                     break;
//             }
//         }
//         break;
//     case 'api/quiz': 
//         $api = new Quiz();
//         if(isset($_GET['id'])){
//             $id = $_GET['id'];
//             switch($request){
//                 case 'GET':
//                     $api->show($id);
//                     break;
//                 case 'POST':
//                     $api->update($id);
//                     break;
//                 case 'DELETE':
//                     $api->destroy($id);
//                     break;
//             }
//         } else {
//             switch($request){
//                 case 'GET':
//                     $api->index($_GET['subject'] ?? null);
//                     break;
//                 case 'POST':
//                     $api->store();
//                     break;
//             }
//         }
//         break;
//         case 'api/quiz/question':
//             $api = new Question();
//             if(isset($_GET['quiz'])){
//                 $quiz = $_GET['quiz'];
//                 switch($request){
//                     case 'GET':
//                         $api->getQuestionOfQuiz($quiz);
//                         break;
//                 }
//             } else if(isset($_GET['id'])){
//                 switch($request){
//                     case 'GET':
//                         $api->show($_GET['id']);
//                         break;
//                     case 'POST':
//                         $api->update($_GET['id']);
//                         break;
//                     case 'DELETE':
//                         $api->destroy($_GET['id']);
//                         break;
//                 }
//             } else {
//                 switch($request){
//                     case 'POST':
//                         $api->addQuestion();
//                         break;
//                 }
//             }
//             // $ctr = new Quiz();
//             // $ctr->addQuestion();
//             break;
//         case 'api/user':
//             $api = new User();
//             if(isset($_GET['id'])){
//                 $id = $_GET['id'];
//                 switch($request){
//                     case 'GET':
//                         $api->show($id);
//                         break;
//                     case 'DELETE':
//                         $api->destroy($id);
//                         break;
//                 }
//             } else {
//                 $api->index();
//             }
//             break;
//         case 'api/lam-quiz':
//             $ctr = new StudentQuiz();
//             switch($request){
//                 case 'POST':
//                     $ctr->createQuiz();
//                     break;
//             }
//             break;
//         case 'api/lam-quiz/tra-loi':
//             $ctr = new StudentQuizDetail();
//             switch($request){
//                 case 'POST':
//                     $ctr->insert();
//                     break;
//             }
//             break;
//     # Dinh nghia controller

//     case 'dang-nhap':
//         $ctr = new LoginController();
//         $ctr->index();
//         break;
//     case 'dang-ky':
//         $ctr = new RegisterController();
//         $ctr->index();
//         break;
//     case 'nguoi-dung':
//         $ctr = new UserController();
//         $ctr->index();
//         break;
//     case 'quan-tri':
//         $ctr = new DashboardController();
//         $ctr->index();
//         break;
//     case 'mon-hoc':
//         $ctr = new SubjectController();
//         $ctr->list();
//         break;
//     case 'mon-hoc/tao-moi':
//         $ctr = new SubjectController();
//         $ctr->create();
//         break;
//     case 'mon-hoc/chi-tiet':
//         break;
//     case 'mon-hoc/quizs':
//         $ctr = new QuizController();
//         $ctr->index();
//         break;
//     case 'mon-hoc/chi-tiet-quizs':
//         $ctr = new QuizController();
//         $ctr->detail($_GET['quiz']);
//         break;
//     case 'mon-hoc/quizs/tao-moi':
//         $ctr = new QuizController();
//         $ctr->create();
//         break;
//     case 'mon-hoc/quizs/lam-quiz':
//         $ctr = new QuizController();
//         $ctr->doQuiz();
//         break;
    
//     default:
//         # code...
//         break;
// }
?>