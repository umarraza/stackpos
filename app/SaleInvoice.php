<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleInvoice extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sale_invoices';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        //'invoice_number',
        'salesId',

        // 'createdAt',
        // 'updatedAt'
    ];
}
