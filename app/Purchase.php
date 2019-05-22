<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'purchases';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'supplierId',
        'totalBill',
        'paidAmount',
        'amountRemaining',
        'discount',
        'returnAmount'
        // 'createdAt',
        // 'updatedAt'
    ];
}
