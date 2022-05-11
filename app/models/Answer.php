<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Answer extends Model{
    protected $table = 'answers';
    public $timestamps = false;
    protected $fillable = [
        'content',
        'question_id',
        'is_correct',
        'img'
    ];
}
?>