<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auto_part extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'article', 'description', 'category_id',
        'producer', 'price', 'main_picture',
        'specifications', 'producer_price', 'priority',
         'status_id', 'number',
        'available', 'seo_url', 'meta_title', 'applicability',
        'meta_description', 'meta_keywords',
    ];
}
