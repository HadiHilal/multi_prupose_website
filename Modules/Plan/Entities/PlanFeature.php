<?php

namespace Modules\Plan\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;

class PlanFeature extends Model
{
    use HasFactory;

    protected $fillable = [];
    use HasTranslations;
    public $translatable = ['name'];
    protected static function newFactory()
    {
        return \Modules\Plan\Database\factories\PlanFeatureFactory::new();
    }
    public function plan(){
        return $this->belongsTo(Plan::class);
    }
}
