<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $connection = 'mysql';
    protected $table = 'user';

    protected $fillable = [
        'username', 'email', 'password', 'role',
    ];
}
