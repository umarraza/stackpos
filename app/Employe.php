<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    protected $table = 'employe';
 
    protected $fillable = [
        'name',
        'email',
        'address',
        'phoneNumber',
        'age',
        'userId'
        // 'createdAt',
        // 'updatedAt'
    ];
}
