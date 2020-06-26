<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auto_product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'category_id',
        'price', 'main_picture', 'specifications',
        'price_in_points', 'performer_price',
        'points', 'main_picture', 'status_id', 
        'available', 'seo_url', 'meta_title',
        'meta_description', 'meta_keywords',
    ];
}
