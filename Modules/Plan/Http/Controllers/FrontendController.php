<?php

namespace Modules\Plan\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Modules\Plan\Entities\Plan;
use Modules\Settings\Entities\Seo;
use Modules\Settings\Entities\Settings;

class FrontendController extends Controller
{

    public function index(){
        $settings = Cache::get('settings');
        if (!$settings){
            $settings   = Settings::all()->pluck('value' , 'key');
            Cache::put('settings' , $settings);
        }

        $seo = Cache::get('seo');
        if (!$seo){
            $seo   = Seo::all()->pluck('value' , 'key');;
            Cache::put('seo' , $seo);
        }

        $plans = Cache::get('plans');
        if (!$plans){
            $plans   = Plan::with('features')->orderBy('price')->take('3')->get();
            Cache::put('plans' , $plans);
        }
        $pricing = 'active';
        return view('plan::index' , compact('settings' , 'seo' , 'plans' , 'pricing'));

    }
}
