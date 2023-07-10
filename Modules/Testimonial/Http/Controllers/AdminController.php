<?php

namespace Modules\Testimonial\Http\Controllers;

use App\Traits\ImgTrait;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;
use Modules\Testimonial\Entities\Testimonial;

class AdminController extends Controller
{
     use ImgTrait ;
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $index_testimonials = 'show';
        $testimonials = Testimonial::all();
        return view('testimonial::admin.index' , compact('index_testimonials' , 'testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $index_testimonials = 'show';
        return view('testimonial::admin.create' ,compact('index_testimonials'));
    }

    public function store(Request $request)
    {
        $rules = [
            'img' => 'required|image|mimes:jpeg,png,jpg|max:1048',
            'name' => 'required',
            'position' => 'required',
            'comment' => 'required',
            'link' => 'nullable|url',

        ];
        $request->validate($rules);
        $path = null;
        $file = $request->file('img');
        if ($file->isValid()) {
                $old_file = null;
                $path = $this->storeImg('testimonials' , $file , $old_file);
         }else{
            session()->flash('alert', ['class' => 'danger', 'msg' => __('admin.AnErrorOccurred')]);
        }
        $testimonial = new Testimonial();
        $testimonial->img = $path;
        $testimonial->name = $request->name;
        $testimonial->position = $request->position;;
        $testimonial->comment = $request->comment;;
        $testimonial->link = $request->link;
        $testimonial->publish = $request->has('publish') ? 1 : 0;
        $testimonial->save();
         Cache::forget('testimonials');
        session()->flash('alert', ['class' => 'success', 'msg' => __('admin.TheOpreationDoneSuccessFully')]);
        return redirect()->to(route('admin.testimonials.index'));
    }


    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $model = Testimonial::findOrFail($id);
         $index_testimonials = 'show';
        return view('testimonial::admin.edit' , compact('model' ,'index_testimonials'));
    }

    public function update(Request $request)
    {
        $id = $request->id;
         $testimonial = Testimonial::findOrFail($id);
           $rules = [
            'img' => 'sometimes|image|mimes:jpeg,png,jpg|max:1048',
            'name' => 'required',
            'position' => 'required',
            'comment' => 'required',
            'link' => 'nullable|url',

        ];
        $request->validate($rules);
        if ($request->has('img')){
            $file = $request->file('img');
        if ($file->isValid()) {
                $old_file = $testimonial->img;
                $path = $this->storeImg('testimonials' , $file , $old_file);
                $testimonial->img = $path;
         }else{
            session()->flash('alert', ['class' => 'danger', 'msg' => __('admin.AnErrorOccurred')]);
        }
        }
        $testimonial->name = $request->name;
        $testimonial->position = $request->position;;
        $testimonial->comment = $request->comment;;
        $testimonial->link = $request->link;
        $testimonial->publish = $request->has('publish') ? 1 : 0;
        $testimonial->save();
        Cache::forget('testimonials');
        session()->flash('alert', ['class' => 'success', 'msg' => __('admin.TheOpreationDoneSuccessFully')]);
        return redirect()->to(route('admin.testimonials.index'));
    }


    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $this->deleteImg($testimonial->img);
        $testimonial->delete();
        Cache::forget('testimonials');
        session()->flash('alert', ['class' => 'success', 'msg' => __('admin.TheOpreationDoneSuccessFully')]);
        return redirect()->to(route('admin.testimonials.index'));
    }
}
