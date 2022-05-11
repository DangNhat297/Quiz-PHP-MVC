<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class StudentQuiz extends Model{
    protected $table = 'student_quizs';
    public $timestamps = false;
    protected $fillable = [
        'student_id', 'quiz_id', 'start_time', 'end_time', 'score'
    ];
}
?>