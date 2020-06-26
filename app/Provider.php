<?php

namespace App;

use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'description', 'assessment',
        'orders_completed_at_time_amount',
        'orders_not_completed_at_time_amount',
        'orders_not_completed_amount',
    ];
}
