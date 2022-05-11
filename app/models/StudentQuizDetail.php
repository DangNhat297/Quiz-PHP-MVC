<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class StudentQuizDetail extends Model{
    protected $table = 'student_quiz_detail';
    public $timestamps = false;
    protected $fillable = [
        'student_quiz_id', 'question_id', 'answer_id'
    ];
}
?>