<?php

namespace Modules\Settings\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Settings extends Model
{
    use HasFactory;

    protected static function newFactory()
    {
        return \Modules\Settings\Database\factories\SettingsFactory::new();
    }

     protected $fillable = [
        'key',
        'value'
    ];

    static public $settings = null;

    static function get($key, $default = null)
    {
        if (empty(self::$settings)) {
            self::$settings = self::all();
        }
        $model = self::$settings
            ->where('key', $key)
            ->first();
        if (empty($model)) {
            if (empty($default)) {
                return false;
            }
            else {
                return $default;
            }
        }
        else {
            return $model->value;
        }
    }

    static function set(string $key, $value)
    {
        if (empty(self::$settings)) {
            self::$settings = self::all();
        }
        if (is_string($value) || is_int($value)) {
            $model = self::$settings
                ->where('key', $key)
                ->first();

            if (empty($model)) {
                $model = self::create([
                    'key' => $key,
                    'value' => $value
                ]);
                self::$settings->push($model);
            }
            else {
                $model->update(compact('value'));
            }
            return true;
        }
        else {
            return false;
        }
    }

}
