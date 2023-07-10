<?php

namespace Modules\Contact\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Modules\Contact\Entities\Contact;
use Modules\Settings\Entities\Seo;
use Modules\Settings\Entities\Settings;

class FrontendController extends  Controller
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
        $contact = 'active';
        return view('contact::index' , compact('settings' , 'seo' , 'contact'));

    }

      public function send_message(Request $request){

        $request->validate([
            'name'   => 'required' ,
            'email'  => 'nullable|email' ,
            'phone'  => 'required' ,
            'subject' => 'nullable|min:5',
            'message' => 'required|min:15',
        ]);
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone =  $request->phone;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->ip_address = $request->ip();
        $contact->save();

         $request->session()->put('formSubmitted', true);

         return Redirect::to('/thank-you');

    }

    public function thanks(){

        if (!Session::has('formSubmitted')) {
            return Redirect::to('/');
        }

        Session::forget('formSubmitted');

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
        $contact = 'active';
        return view('contact::thank-you' , compact('settings' , 'seo' , 'contact'));
    }

}
