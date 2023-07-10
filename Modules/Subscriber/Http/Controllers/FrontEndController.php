<?php

namespace Modules\Subscriber\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Validation\Rule;
use Modules\Subscriber\Entities\Subscriber;

class FrontEndController extends Controller
{
   public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscribers,email'
        ]);
        Subscriber::create(['email'=>$request->email]);
        session()->flash('success',  __('frontend.ThanksForSubscription'));
        return redirect()->back();

    }
}
