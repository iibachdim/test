<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'no_invoice', 'penjualan_id', 'total'
    ];
}
