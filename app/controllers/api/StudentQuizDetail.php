<?php

namespace App\Controllers\API;

use App\Models\StudentQuizDetail as ModelsStudentQuizDetail;
use PDOException;

class StudentQuizDetail extends BaseAPI{

    public function insert(){
        $data = (object)$_POST;
        // $questionExist = ModelsStudentQuizDetail::where(['student_quiz_id', '=', $data->student_quiz_id])
        //                                         ->andWhere(['question_id', '=', $data->question_id])
        //                                         ->get();
        $questionExist = ModelsStudentQuizDetail::where('student_quiz_id', $data->student_quiz_id)
                                                ->where('question_id', $data->question_id)
                                                ->exists();                                        
        if($questionExist){
        //    $sql = "DELETE FROM student_quiz_detail WHERE student_quiz_id = " . $data->student_quiz_id . " AND question_id = " . $data->question_id; 
        //    ModelsStudentQuizDetail::rawQuery($sql)->execute();
           ModelsStudentQuizDetail::where('student_quiz_id', $data->student_quiz_id)
                                    ->where('question_id', $data->question_id)
                                    ->delete();
        } 

        foreach($data->answer as $answer){
            try{
                ModelsStudentQuizDetail::create([
                    'student_quiz_id'   => $data->student_quiz_id,
                    'question_id'       => $data->question_id,
                    'answer_id'         => $answer
                ]);
                $this->response(['status' => 'success']);
            }catch(PDOException $e){
                $this->response(['status' => 'error', 'message' => $e->getMessage()]);
            }
        }
    }

}