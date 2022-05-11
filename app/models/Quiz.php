<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Quiz extends Model{
    protected $table = 'quizs';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'subject_id',
        'duration_minutes',
        'start_time',
        'end_time',
        'status',
        'is_shuffle'
    ];
}
?>