<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductSale extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'products_sale';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'barCode',
        'color',
        'size',
        'brandName',
        'quantity',
        'model',
        'costPrice',
        'totalPrice',
        'saleId'
        // 'createdAt',
        // 'updatedAt'
    ];
}
