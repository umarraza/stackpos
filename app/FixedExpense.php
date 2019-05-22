<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FixedExpense extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'fixedexpenses';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'expenseName',
        'description',
        'amount',
        // 'createdAt',
        // 'updatedAt'
    ];
}
