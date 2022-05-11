<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class User extends Model{
    protected $table = 'users';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'role_id'
    ];
    protected $hidden = [
        'password'
    ];
}
?>