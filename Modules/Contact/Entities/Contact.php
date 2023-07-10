<?php

namespace Modules\Contact\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Torann\GeoIP\Facades\GeoIP;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [];

    protected static function newFactory()
    {
        return \Modules\Contact\Database\factories\ContactFactory::new();
    }

   public function getCountryAttribute()
{
    $ip = $this->ip_address;
    $location = GeoIP::getLocation($ip);
    return $location->country;
}
}
