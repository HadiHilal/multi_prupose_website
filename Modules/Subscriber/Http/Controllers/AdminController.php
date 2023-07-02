<?php

namespace Modules\Subscriber\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Subscriber\Entities\Subscriber;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $model = Subscriber::all();
        $index_subscribers = 'show';
        return view('subscriber::admin.index' , compact('model' , 'index_subscribers'));
    }
    public function destroy($id)
    {
        $model =Subscriber::findOrFail($id);
        $model->delete();
        session()->flash('alert', ['class' => 'success', 'msg' => __('admin.TheOpreationDoneSuccessFully')]);
        return redirect()->back();
    }
}
