<?php

namespace App\Controllers\API;

use App\Models\Answer;
use App\Models\Question;
use App\Models\StudentQuiz as StudentQuizModel;
use App\Models\StudentQuizDetail;
use Core\Session;
use PDOException;

class StudentQuiz extends BaseAPI
{

    public function createQuiz()
    {
        $data = (object)$_POST;
        $studentID = Session::get('user')['id'];
        $quizID = $data->quiz_id;
        $startTime = date("Y-m-d H:i:s");
        $studentQuiz = StudentQuizModel::create([
            'student_id'    => $studentID,
            'quiz_id'       => $quizID,
            'start_time'    => $startTime,
            'score'         => 0
        ]);
        $lastID = $studentQuiz;
        $this->response($lastID);
    }

    public function finishQuiz()
    {
        $data = (object)$_POST;
        try {
            $modelStudentQuiz = StudentQuizModel::find($data->id);
            $modelStudentQuiz->end_time = date("Y-m-d H:i:s");
            // $studentQuiz = StudentQuizModel::where('id', $data->id)->first();
            $countQuestion = Question::where('quiz_id', $modelStudentQuiz->quiz_id)->count(); // dem so luong cau hoi cua quiz
            // $questionsAnswered = StudentQuizDetail::rawQuery("SELECT * FROM student_quiz_detail WHERE student_quiz_id = " . $id . " GROUP BY question_id")->get(); // so cau hoi da tra loi
            $questionsAnswered = StudentQuizDetail::where('student_quiz_id', $data->id)->groupBy('question_id')->get();
            $questionsCorrect = [];
            foreach ($questionsAnswered as $question) {
                $answers = Answer::where('question_id', $question->question_id)->get();
                // dap an cua cau hoi
                $arrAnswerCorrect = [];
                foreach ($answers as $answer) {
                    if ($answer->is_correct == 1) $arrAnswerCorrect[] = $answer->id;
                }
                // lay cau tra loi
                $answerChoose = StudentQuizDetail::where('student_quiz_id', $data->id)
                    ->where('question_id', $question->question_id)->get();
                $arrAnswerChoose = [];
                foreach ($answerChoose as $answer) {
                    $arrAnswerChoose[] = $answer->answer_id;
                }

                // $containsSearch = count(array_intersect($arrAnswerChoose, $arrAnswerCorrect)) === count($arrAnswerCorrect);
                $containsSearch = (count(array_intersect($arrAnswerChoose, $arrAnswerCorrect)) === count($arrAnswerCorrect) && count($arrAnswerCorrect) === count($arrAnswerChoose)) ? true : false;

                if ($containsSearch) $questionsCorrect[] = $question->question_id;
            }
            $score = round((10/$countQuestion)*(count($questionsCorrect)), 2);
            $modelStudentQuiz->score = $score;
            $modelStudentQuiz->save();
            $this->response(['status' => 'success']);
        } catch (PDOException $e) {
            $this->response(['status' => 'error']);
        }
    }

    public function statisticResult($id){
        $quizs = StudentQuizModel::select('student_quizs.*', 'users.name')
                                ->join('users', 'student_quizs.student_id', '=', 'users.id')
                                ->where('student_quizs.quiz_id', $id)
                                ->get()
                                ->toArray();
        $quizs = array_map(function($value){
            $value = (object)$value;
            return [
                'name'  => $value->name,
                'score' => $value->score,
                'time'  => \App\Helpers\Helper::minuteBetween($value->start_time, $value->end_time),
                'status'=> ($value->end_time) ? 'Đã nộp bài' : 'Chưa nộp bài'
            ];
        }, $quizs);
        $this->response(['data' => $quizs]);
    }
}
