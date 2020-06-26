<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specification_part extends Model
{
    protected $fillable = [
        'part_id', 'specification_id',
    ];
}
