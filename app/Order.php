<?php

namespace App;

use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_or_part', 'product_or_part_id',
        'user_id', 'amount', 'delivery', 'sum',
        'status_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'product_or_part_id', 'user_id',
    ];
}
