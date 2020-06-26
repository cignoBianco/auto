<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'specifications', 'section_id', 'priority',
        'show', 'main_picture', 'seo_url', 'meta_title',
        'meta_description', 'meta_keywords',
    ];
}
