<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sales';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customerId',
        'totalBill',
        'paidAmount',
        'amountRemaining',
        'returnAmount'
        // 'createdAt',
        // 'updatedAt'
    ];
}
