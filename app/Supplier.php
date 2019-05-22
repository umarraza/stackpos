<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'suppliers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'brandName',
        'cellNumber',
        'address',
        'accountNumber',
        'userId',
        // 'createdAt',
        // 'updatedAt'
    ];
}
