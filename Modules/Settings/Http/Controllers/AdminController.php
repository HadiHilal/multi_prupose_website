<?php

namespace Modules\Settings\Http\Controllers;


use App\Traits\ImgTrait;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Settings\Entities\Seo;
use Modules\Settings\Entities\Settings;


class AdminController extends Controller {

    use ImgTrait ;
    public function index(){
        $website_settings = 'show';
        $settings = Settings::pluck('value' ,'key');
        return view('settings::admin.index' , compact('website_settings' , 'settings'));
    }

    public function store(Request $request){

        if ($request->hasFile('imgs')) {
        $files = $request->file('imgs');
        foreach ($files as $key => $file) {

            if ($file->isValid()) {
                $old_file = null;
                if (Settings::get($key)){
                    $old_file = Settings::get($key);
                }
                $path = $this->storeImg('settings' , $file , $old_file);
                Settings::set($key , $path);
            }
        }
        }
        foreach ($request['data'] as $key => $value){
         Settings::set($key , $value);
       }

        session()->flash('alert', ['class' => 'success', 'msg' => __('admin.TheOpreationDoneSuccessFully')]);
        return redirect()->back();
    }


    public function seo_index(){
        $website_seo= 'show';
        $seo = Seo::pluck('value' ,'key');
        return view('settings::admin.seo_index' , compact('website_seo' , 'seo'));
    }

    public function seo_store(Request $request){
        $lang = $request->input('lang');
        foreach ($request['data'] as $key => $value){
         Seo::set($key , $value ,$lang);
       }

        session()->flash('alert', ['class' => 'success', 'msg' => __('admin.TheOpreationDoneSuccessFully')]);
        return redirect()->back();
    }

}
