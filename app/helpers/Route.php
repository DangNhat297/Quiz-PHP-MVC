<?php
namespace App\Helpers;

use App\Controllers\HomeController;
use \Phroute\Phroute\RouteCollector;
use App\Controllers\API\Login;
use App\Controllers\API\Question;
use App\Controllers\API\Quiz;
use App\Controllers\API\Register;
use App\Controllers\API\StudentQuiz;
use App\Controllers\API\StudentQuizDetail;
use App\Controllers\API\Subject;
use App\Controllers\API\User;
use App\Controllers\DashboardController;
use App\Controllers\LoginController;
use App\Controllers\QuizController;
use App\Controllers\RegisterController;
use App\Controllers\SubjectController;
use App\Controllers\TestController;
use App\Controllers\UserController;
use Exception;
use Core\Session;
class Route{
    public static function run($url){
        $router = new RouteCollector();

        # Dinh nghia middleware
        $router->filter('loginExist', function(){
            if(!isLogging()) header('location: ' . route('dang-nhap'));
        });

        $router->filter('loginNotExist', function(){
            if(isLogging()) header('location: ' . route(''));
        });

        $router->filter('isAdmin', function(){
            if(!isLogging() || Session::get('user')['role_id'] != 1) header('location: ' . route(''));
        });

        # Dinh nghia route API

        $router->group(['prefix' => 'api'], function($router){

            # auth
            $router->post('login', [Login::class, 'handle']);

            $router->post('register', [Register::class, 'handle']);

            # subject
            $router->group(['prefix' => 'subject'], function($router){
                $router->get('/', [Subject::class, 'index']);

                $router->post('/', [Subject::class, 'create']);
    
                $router->get('{id:i}', [Subject::class, 'show']);
    
                $router->post('{id:i}', [Subject::class, 'update']);
    
                $router->delete('{id:i}', [Subject::class, 'destroy']);
            });

            # quiz
            $router->get('subject/quiz/{subject}?', [Quiz::class, 'index']);

            $router->group(['prefix' => 'quiz'], function($router){
                $router->get('/', [Quiz::class, 'list']);

                $router->post('/', [Quiz::class, 'store']);

                $router->get('{id:i}', [Quiz::class, 'show']);

                $router->post('{id:i}', [Quiz::class, 'update']);

                $router->delete('{id:i}', [Quiz::class, 'destroy']);

                $router->post('finish', [StudentQuiz::class, 'finishQuiz']);

                // statistic result

                $router->get('result/{id:i}', [StudentQuiz::class, 'statisticResult']);
            });

            # question
            $router->get('quiz/{id:i}/questions', [Question::class, 'getQuestionOfQuiz']);

            $router->group(['prefix' => 'question'], function($router){
                $router->post('/', [Question::class, 'addQuestion']);

                $router->get('{id:i}', [Question::class, 'show']);

                $router->post('{id:i}', [Question::class, 'update']);

                $router->delete('{id:i}', [Question::class, 'destroy']);
            });

            # user
            $router->group(['prefix' => 'user'], function($router){
                $router->get('/', [User::class, 'index']);

                $router->get('{id:i}', [User::class, 'show']);

                $router->delete('{id:i}', [User::class, 'destroy']);
            });

            # lam quiz
            $router->post('lam-quiz', [StudentQuiz::class, 'createQuiz']);

            $router->post('lam-quiz/tra-loi', [StudentQuizDetail::class, 'insert']);

        });

        # Dinh nghia route

        $router->get('/', [HomeController::class, 'index'], ['before' => 'loginExist']);

        $router->get('quan-tri', [DashboardController::class, 'index'], ['before' => 'isAdmin']); # Admin

        $router->get('dang-nhap', [LoginController::class, 'index'], ['before' => 'loginNotExist']);

        $router->get('dang-ky', [RegisterController::class, 'index'], ['before' => 'loginNotExist']);

        $router->get('dang-xuat', [LoginController::class, 'logout'], ['before' => 'loginExist']);

        $router->get('nguoi-dung', [UserController::class, 'index'], ['before' => 'isAdmin']); # Admin

        $router->group(['prefix' => 'mon-hoc', 'before' => 'loginExist'], function($router){
            $router->get('/', [SubjectController::class, 'list']); # Admin

            $router->get('tao-moi', [SubjectController::class, 'create'], ['before' => 'isAdmin']); # Admin

            $router->get('quizs', [QuizController::class, 'index'], ['before' => 'isAdmin']); # Admin

            $router->get('chi-tiet-quizs/{id:i}', [QuizController::class, 'detail'], ['before' => 'isAdmin']); # Admin

            $router->get('quizs/tao-moi', [QuizController::class, 'create'], ['before' => 'isAdmin']); # Admin

            $router->get('quizs/lam-quiz/{quizid:i}', [QuizController::class, 'doQuiz']);

            $router->get('{subject:i}/quizs',[QuizController::class, 'list']);
        });

        $router->get('quiz/{id:i}', [QuizController::class, 'show'], ['before' => 'loginExist']);

        $router->get('ket-qua/{id:i}', [QuizController::class, 'result'], ['before' => 'loginExist']);

        $router->get('test', [TestController::class, 'index']);

        $router->get('lich-su', [QuizController::class, 'history']);

        $router->get('thong-ke', [QuizController::class, 'statistic']);

        try{
            # NB. You can cache the return value from $router->getData() so you don't have to create the routes each request - massive speed gains
            $dispatcher = new \Phroute\Phroute\Dispatcher($router->getData());

            $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($url, PHP_URL_PATH));
                
            // Print out the value returned from the dispatched function
            echo $response;
        }catch(Exception $e){
            die($e->getMessage());
        }

    }
}
?>