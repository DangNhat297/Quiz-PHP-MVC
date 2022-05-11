<?php

namespace App\Controllers\API;

use App\Helpers\Helper;
use App\Models\Subject as SubjectModel;
use Core\Session;
use PDOException;
class Subject extends BaseAPI{

    public function index(){
        // $subjects = SubjectModel::rawQuery("SELECT subjects.*, users.name as author_name FROM subjects INNER JOIN users ON subjects.author_id = users.id")->get();
        $subjects = SubjectModel::select('subjects.*', 'users.name as author_name')
                            ->join('users', 'subjects.author_id', '=', 'users.id')
                            ->get();
        $this->response(['data' => $subjects],200);
    }

    public function create(){
        $data = (object)$_POST;
        $subject = Helper::handleField($data->subject);
        try{
            SubjectModel::create([
                'name'      => $subject,
                'author_id' => Session::get('user')['id']
            ]);
            $this->response(['status' => 'success','subject' => $subject]);
        }catch(PDOException $e){
            $this->response(['status' => 'error']);
        }
    }

    public function show($id){
        $subject = SubjectModel::where('id', $id)->first();
        $this->response($subject,200);
    }

    public function update($id){
        $data = (object)$_POST;
        $name = Helper::handleField($data->subject);
        // $this->response(['data' => $data['subject']]);
        try{
            $subject = SubjectModel::find($id);
            $subject->name = $name;
            $subject->save();
            $this->response(['status' => 'success']);
        }catch(PDOException $e){
            $this->response(['status' => 'error']);
        }
    }

    public function destroy($id){
        try{
            SubjectModel::destroy($id);
            $this->response(['status' => 'success']);
        }catch(PDOException $e){
            $this->response(['status' => 'error']);
        }
    }

}