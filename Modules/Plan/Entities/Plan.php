<?php

namespace Modules\Plan\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;

class Plan extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['name'];
    protected $fillable = [];

    protected static function newFactory()
    {
        return \Modules\Plan\Database\factories\PlanFactory::new();
    }

    public function features(){
        return $this->hasMany(PlanFeature::class);
    }
}
