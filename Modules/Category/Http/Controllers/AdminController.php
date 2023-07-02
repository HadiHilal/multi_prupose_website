<?php

namespace Modules\Category\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Category\Entities\Category;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $index_categories = 'show';
        $categories = Category::all();
        return view('category::admin.index' , compact('index_categories' , 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $categorey = new Category();
        $categorey->name = $request->name;
        $categorey->save();
        session()->flash('alert', ['class' => 'success', 'msg' => __('admin.TheOpreationDoneSuccessFully')]);
        return redirect()->back();
    }

    public function update(Request $request)
    {
         $request->validate([
             'id' => 'required',
            'name' => 'required',
        ]);
        $categorey = Category::findOrFail($request->id);
        $categorey->name = $request->name;
        $categorey->save();
        session()->flash('alert', ['class' => 'success', 'msg' => __('admin.TheOpreationDoneSuccessFully')]);
        return redirect()->back();
    }

    public function destroy($id)
    {
        Category::findOrFail($id)->delete();
        session()->flash('alert', ['class' => 'success', 'msg' => __('admin.TheOpreationDoneSuccessFully')]);
        return redirect()->back();
    }
}
