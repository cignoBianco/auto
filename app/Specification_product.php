<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specification_product extends Model
{
    protected $fillable = [
        'product_id', 'specification_id',
    ];
}
