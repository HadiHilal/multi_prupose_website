<?php

namespace Modules\Subscriber\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;


class Subscriber extends Model
{
    use Notifiable;
    use HasFactory;

    protected $fillable = [];

    protected static function newFactory()
    {
        return \Modules\Subscriber\Database\factories\SubscriberFactory::new();
    }
}
