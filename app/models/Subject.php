<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Subject extends Model{
    protected $table = 'subjects';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'author_id'
    ];

    // public static function getSubject(){
    //     return parent::rawQuery("SELECT subjects.*, users.name as author_name FROM subjects JOIN users ON subjects.author_id = users.id")->get();
    // }
}
?>