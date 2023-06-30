<?php

namespace Modules\Testimonial\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;

class Testimonial extends Model
{
    use HasFactory;
    use HasTranslations;
     public $translatable = ['name' , 'position' , 'comment'];
    protected $fillable = [];


}
