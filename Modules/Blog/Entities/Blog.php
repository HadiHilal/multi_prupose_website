<?php

namespace Modules\Blog\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Category\Entities\Category;
use Spatie\Translatable\HasTranslations;


class Blog extends Model
{
    use HasFactory, HasTranslations;
    protected $appends = ['views_count'];
    protected $fillable = [];
    public $translatable = ['title', 'keywords', 'content' , 'intro'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'categorey_id', 'id');
    }

    public function views(){
        return $this->hasMany(BlogView::class , 'blog_id' , 'id');
    }

    public function getViewsCountAttribute() {
        $sum = 0;
        foreach ($this->views as $one){
            $sum += $one->total_views;
        }
        return $sum;
    }
}
