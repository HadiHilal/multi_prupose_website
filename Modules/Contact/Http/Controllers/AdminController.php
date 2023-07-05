<?php

namespace Modules\Contact\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Contact\Entities\Contact;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $index_contacts = 'show';
        $contacts = Contact::orderByDesc('created_at')->get();
        return view('contact::admin.index' , compact('index_contacts' , 'contacts'));
    }


    public function destroy($id)
    {
        Contact::findOrFail($id)->delete();
        session()->flash('alert', ['class' => 'success', 'msg' => __('admin.TheOpreationDoneSuccessFully')]);
        return back();
    }
}
