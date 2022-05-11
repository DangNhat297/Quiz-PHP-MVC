<?php

namespace App\Controllers\API;

use App\Helpers\Helper;
use App\Models\Answer;
use App\Models\Question as ModelsQuestion;
use PDOException;

class Question extends BaseAPI{

    public function show($id){
        $question = ModelsQuestion::where('id', $id)->first();
        $question->answers = Answer::where('question_id', $question->id)->get(); 
        $this->response($question);
    }

    // public function getQuestionOfQuiz($id){
    //     $questions = ModelsQuestion::where('quiz_id', $id)->get();
    //     $questions = array_map(function($value){
    //         $answer = Answer::where('question_id', $value->id)->get();
    //         return [
    //             'id'        => $value->id,
    //             'name'      => $value->name,
    //             'img'       => $value->img,
    //             'answer'    => $answer
    //         ];
    //     },$questions);
    //     $this->response(['data' => $questions]);
    // }

    public function addQuestion(){
        $data = (object)$_POST;
        try{
            $model = ModelsQuestion::create([
                'name'      => $data->question,
                'img'       => $data->question_img,
                'quiz_id'   => $data->quiz_id
            ]);
            $question = $model->id;
            // ModelsQuestion::rawQuery('SET GLOBAL max_allowed_packet=1073741824;')->execute();
            // $question = ModelsQuestion::rawQuery('SELECT max(id) as lastid FROM questions')->first()->lastid;
            foreach($data->answer as $key => $answer){
                Answer::create([
                    'content'       => $answer,
                    'question_id'   => $question,
                    'is_correct'    => (in_array($key, $data->answer_correct)) ? 1 : 0,
                    'img'           => $data->{'answer_img'.$key}
                ]);
            }
            $this->response(['status' => 'success']);
        }catch(PDOException $e){
            $this->response(['status' => 'error', 'message' => $e->getMessage()]);
        }
        // $this->response(['data' => $_POST]);
    }

    public function destroy($id){
        try{
            ModelsQuestion::destroy($id);
            Answer::where('question_id', $id)->delete();
            // Answer::rawQuery("DELETE FROM answers WHERE question_id = $id")->execute();
            $this->response(['status' => 'success']);
        }catch(PDOException $e){
            $this->response(['status' => 'error']);
        }
    }

    public function update($id){
        $data = (object)$_POST;
        try{
            // (new ModelsQuestion)->update([
            //     'name'      => Helper::handleField($data->question),
            //     'img'       => $data->question_img
            // ],$id);
            ModelsQuestion::find($id)->update([
                'name'      => Helper::handleField($data->question),
                'img'       => $data->question_img
            ]);
            // Answer::rawQuery("DELETE FROM answers WHERE question_id = $id")->execute();
            Answer::where('question_id', $id)->delete();
            foreach($data->answer as $key => $answer){
                // (new Answer)->insert([
                //     'content'       => Helper::handleField($answer),
                //     'question_id'   => $id,
                //     'is_correct'    => (in_array($key, $data->answer_correct)) ? 1 : 0,
                //     'img'           => $data->{'answer_img'.$key}
                // ]);
                Answer::create([
                    'content'       => $answer,
                    'question_id'   => $id,
                    'is_correct'    => (in_array($key, $data->answer_correct)) ? 1 : 0,
                    'img'           => $data->{'answer_img'.$key}
                ]);
            }
            $this->response(['status' => 'success']);
        }catch(PDOException $e){
            $this->response(['status' => 'error']);
        }
    }

}