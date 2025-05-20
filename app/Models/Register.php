<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    protected $table = 'register';
    protected $primaryKey = 'idUser';


    protected $fillable = [
        'firstName',
        'lastName',
        'email',
        'username',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

}
