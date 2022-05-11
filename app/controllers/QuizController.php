<?php
namespace App\Controllers;

use App\Helpers\Helper;
use App\Models\Subject;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Quiz;
use App\Models\StudentQuiz;
use App\Models\StudentQuizDetail;
use Core\Session;

class QuizController extends BaseController{
    # admin

    public function create(){
        // $subjects = Subject::getSubject();
        // SELECT subjects.*, users.name as author_name FROM subjects JOIN users ON subjects.author_id = users.id
        $subjects = Subject::select('subjects.*', 'users.name as author_name')
                            ->join('users', 'subjects.author_id', '=', 'users.id')
                            ->get();
        $this->render('addquiz', ['subjects' => $subjects]);
    }

    public function index(){
        $subjects = Subject::select('subjects.*', 'users.name as author_name')
                            ->join('users', 'subjects.author_id', '=', 'users.id')
                            ->get();
        $this->render('ListQuiz', ['subjects' => $subjects]);
    }

    public function detail($id){
        $questions = Question::where('quiz_id', $id)->get()->toArray();
        // var_dump($questions);
        // die();
        $questions = array_map(function($value){
            $value = (object)$value;
            $answer = Answer::where('question_id', $value->id)->get();
            return (object)[
                'id'        => $value->id,
                'name'      => $value->name,
                'img'       => $value->img,
                'answers'   => $answer
            ];
        },$questions);
        // $questions = (object)$questions;
        // print_r($questions);
        // die();
        $this->render('QuizDetail', ['questions' => $questions]);
    }

    # client

    public function doQuiz($quizid){
        // $quizID = $_GET['quiz'];
        $quiz = Quiz::where('id', $quizid)->first();
        $questions = Question::where('quiz_id', $quizid)->get()->toArray();
        $questions = array_map(function($val){
            $val = (object)$val;
            return (object)[
                'id'    => $val->id,
                'name'  => $val->name,
                'img'   => $val->img,
                'answer'=> Answer::where('question_id', $val->id)->get()->toArray()
            ];
        }, $questions);
        if($quiz->is_shuffle == 1) shuffle($questions);
        // var_dump($questions);
        // die();
        $this->render('DoQuiz', [
            'questions' => $questions,
            'time'      => $quiz->duration_minutes
        ]);
    }

    public function list($subject){
        // $sql = "SELECT quizs.*, subjects.name as subject_name FROM quizs INNER JOIN subjects ON quizs.subject_id = subjects.id WHERE quizs.subject_id = $subject AND quizs.status = 1";
        // $quizs = Quiz::rawQuery($sql)->get();
        $quizs = Quiz::select('quizs.*', 'subjects.name as subject_name')
                        ->join('subjects', 'quizs.subject_id', '=', 'subjects.id')
                        ->where('quizs.subject_id', $subject)
                        ->where('quizs.status', 1)
                        ->get();
        $this->render('quiz', ['quizs' => $quizs]);
    }

    public function show($id){
        // $quiz = Quiz::rawQuery("SELECT quizs.*, subjects.name as subject_name, count(questions.id) as num_questions FROM quizs INNER JOIN subjects ON quizs.subject_id = subjects.id INNER JOIN questions ON quizs.id = questions.quiz_id WHERE quizs.id = $id")->first();
        $quiz = Quiz::select('quizs.*', 'subjects.name as subject_name', Quiz::raw('count(questions.id) as num_questions'))
                    ->join('subjects', 'quizs.subject_id', '=', 'subjects.id')
                    ->join('questions', 'quizs.id', '=', 'questions.quiz_id')
                    ->where('quizs.id', $id)
                    ->first();
        // print_r($quiz);
        // die();
        $this->render('quizinfo', ['quiz' => $quiz]);
    }

    public function result($id){
        $studentQuiz = StudentQuiz::where('id', $id)->first();
        $countQuestion = Question::where('quiz_id', $studentQuiz->quiz_id)->count(); // dem so luong cau hoi cua quiz
        // $questionsAnswered = StudentQuizDetail::rawQuery("SELECT * FROM student_quiz_detail WHERE student_quiz_id = " . $id . " GROUP BY question_id")->get(); // so cau hoi da tra loi
        $questionsAnswered = StudentQuizDetail::where('student_quiz_id', $id)->groupBy('question_id')->get();
        $questionsCorrect = [];
        foreach($questionsAnswered as $question){
            $answers = Answer::where('question_id', $question->question_id)->get(); 
            // dap an cua cau hoi
            $arrAnswerCorrect = [];
            foreach($answers as $answer){
                if($answer->is_correct == 1) $arrAnswerCorrect[] = $answer->id;
            }
            // lay cau tra loi
            $answerChoose = StudentQuizDetail::where('student_quiz_id', $id)
                                            ->where('question_id', $question->question_id)->get();
            $arrAnswerChoose = [];
            foreach($answerChoose as $answer){
                $arrAnswerChoose[] = $answer->answer_id;
            }

            // $containsSearch = count(array_intersect($arrAnswerChoose, $arrAnswerCorrect)) === count($arrAnswerCorrect);
            $containsSearch = (count(array_intersect($arrAnswerChoose, $arrAnswerCorrect)) === count($arrAnswerCorrect) && count($arrAnswerCorrect) === count($answerChoose)) ? true : false;

            if($containsSearch) $questionsCorrect[] = $question->question_id;
            
        }
        $workTime = Helper::minuteBetween($studentQuiz->start_time, $studentQuiz->end_time);
        $questions = Question::where('quiz_id', $studentQuiz->quiz_id)->get()->toArray();
        $questions = array_map(function($value){
            $value = (object)$value;
            $answer = Answer::where('question_id', $value->id)->get();
            return (object)[
                'id'        => $value->id,
                'name'      => $value->name,
                'img'       => $value->img,
                'answer'    => $answer
            ];
        },$questions);
        $this->render('result',[
            'countQuestion'     => $countQuestion,
            'questionsAnswered' => $questionsAnswered,
            'questionsCorrect'  => $questionsCorrect,
            'score'             => $studentQuiz->score,
            'time'              => $workTime,
            'questions'         => $questions
        ]);
    }

    public function history(){
        $userID = Session::get('user')['id'];
        $quizs = StudentQuiz::select('student_quizs.*', 'quizs.name')
                            ->join('quizs', 'student_quizs.quiz_id', '=', 'quizs.id')
                            ->where('student_quizs.student_id', $userID)
                            ->get();
        $this->render('QuizHistory', [
            'quizs' => $quizs
        ]);
    }

    public function statistic(){
        $quizs = StudentQuiz::select('student_quizs.*', 'quizs.name', StudentQuiz::raw('AVG(student_quizs.score) as avg'))
                            ->join('quizs', 'student_quizs.quiz_id', '=', 'quizs.id')
                            ->groupBy('quizs.id')
                            ->get();
        $this->render('statistic', ['quizs' => $quizs]);
    }

}

?>