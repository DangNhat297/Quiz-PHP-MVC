<?php

namespace App\Controllers\API;

use App\Helpers\Helper;
use App\Models\Quiz as ModelsQuiz;
use PDOException;

class Quiz extends BaseAPI{

    public function index($subject = null){
        if($subject != null){
            // $sql = "SELECT quizs.*, subjects.name as subject_name FROM quizs INNER JOIN subjects ON quizs.subject_id = subjects.id WHERE quizs.subject_id = $subject";
            $quizs = ModelsQuiz::select('quizs.*', 'subjects.name as subject_name')
                                ->join('subjects', 'quizs.subject_id', '=', 'subjects.id')
                                ->where('quizs.subject_id', $subject)
                                ->get();
            // $quizs = ModelsQuiz::rawQuery($sql)->get();
        } else {
            // $sql = "SELECT quizs.*, subjects.name as subject_name FROM quizs INNER JOIN subjects ON quizs.subject_id = subjects.id";
            // $quizs = ModelsQuiz::rawQuery($sql)->get();
            $quizs = ModelsQuiz::select('quizs.*', 'subjects.name as subject_name')
                                ->join('subjects', 'quizs.subject_id', '=', 'subjects.id')
                                ->get();
        }
        $this->response(['data' => $quizs]);
    }

    public function show($id){
        // $quiz = ModelsQuiz::rawQuery("SELECT quizs.*, subjects.name as subject_name FROM quizs INNER JOIN subjects ON quizs.subject_id = subjects.id WHERE quizs.id = $id")->first();
        $quiz = ModelsQuiz::select('quizs.*', 'subjects.name as subject_name')
                            ->join('subjects', 'quizs.subject_id', '=', 'subjects.id')
                            ->where('quizs.id', $id)
                            ->first();
        $this->response($quiz);
    }

    public function store(){
        $data = (object)$_POST;
        $time = explode("-", $data->daterange);
        $isShuffle = isset($data->is_shuffle) ? $data->is_shuffle : 0;
        $startTime = Helper::toDateTime("d/m/Y H:i:s", trim($time[0]));
        $endTime = Helper::toDateTime("d/m/Y H:i:s", trim($time[1]));
        $name = Helper::handleField($data->name);
        try{
            ModelsQuiz::create([
                'name'              => $name,
                'subject_id'        => $data->subject_id,
                'duration_minutes'  => $data->duration_minutes,
                'start_time'        => $startTime,
                'end_time'          => $endTime,
                'status'            => $data->status,
                'is_shuffle'        => $isShuffle
            ]);
            $this->response(['status' => 'success']);
        }catch(PDOException $e){
            $this->response(['status' => 'error']);
        }
    }

    public function update($id){
        $data = (object)$_POST;
        $time = explode("-", $data->daterange);
        $isShuffle = isset($data->is_shuffle) ? $data->is_shuffle : 0;
        $startTime = Helper::toDateTime("d/m/Y H:i:s", trim($time[0]));
        $endTime = Helper::toDateTime("d/m/Y H:i:s", trim($time[1]));
        $name = Helper::handleField($data->name);
        try{
            // (new ModelsQuiz)->update([
                
            // ],$id);
            ModelsQuiz::find($id)->update([
                'name'              => $name,
                'subject_id'        => $data->subject_id,
                'duration_minutes'  => $data->duration_minutes,
                'start_time'        => $startTime,
                'end_time'          => $endTime,
                'status'            => $data->status,
                'is_shuffle'        => $isShuffle
            ]);
            $this->response(['status' => 'success']);
        }catch(PDOException $e){
            $this->response(['status' => 'error']);
        }
    }

    public function destroy($id){
        try{
            ModelsQuiz::destroy($id);
            $this->response(['status' => 'success']);
        }catch(PDOException $e){
            $this->response(['status' => 'error']);
        }
    }

    public function addQuestion(){
        $this->response(['data' => $_POST, 'file' => $_FILES]);
    }

}