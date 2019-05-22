<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductInventory extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'products_inventory';

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
        // 'createdAt',
        // 'updatedAt'
    ];
}
