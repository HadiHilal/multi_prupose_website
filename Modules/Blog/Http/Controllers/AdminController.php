<?php

namespace Modules\Blog\Http\Controllers;

use App\Traits\ImgTrait;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;
use Modules\Blog\Entities\Blog;
use Modules\Blog\Notifications\NotifyUsersOfNewBlog;
use Modules\Category\Entities\Category;
use Modules\Subscriber\Entities\Subscriber;

class AdminController extends Controller
{
    use ImgTrait;
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $blogs = Blog::with('category')->get();
        $index_blogs = 'show';
        return view('blog::admin.index' , compact('blogs' , 'index_blogs'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $index_blogs = 'show';
        $categories = Category::all();
        return view('blog::admin.create' , compact('index_blogs' , 'categories'));
    }

    public function store(Request $request)
    {

        $rules = [
            'img' => 'required|image|mimes:jpeg,png,jpg,webp|max:1048',
            'slug' => 'required',
            'title' => 'required',
            'intro' => 'required',
            'keywords' => 'required',
            'content' => 'required',
            'category' => 'required'
        ];
        $request->validate($rules);
        $path = null;
        if ($request->has('img')){
            $file = $request->file('img');
        if ($file->isValid()) {
                $old_file = null;
                $path = $this->storeImg('blogs' , $file , $old_file);
         }else{
            session()->flash('alert', ['class' => 'danger', 'msg' => __('admin.AnErrorOccurred')]);
        }
        }
        $blog = new Blog();
        $blog->img = $path;
        $blog->slug = $request->slug;
        return $this->extracted($request, $blog);

    }



    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        $index_blogs = 'show';
        $categories = Category::all();
        return view('blog::admin.edit' , compact('blog' , 'categories' , 'index_blogs'));
    }

    public function update(Request $request)
    {
          $rules = [
            'img' => 'sometimes|image|mimes:jpeg,png,jpg,webp|max:1048',
            'title' => 'required',
            'intro' => 'required',
            'keywords' => 'required',
            'content' => 'required',
            'category' => 'required'
        ];
        $request->validate($rules);
        $id = $request->id;
        $blog = Blog::findOrFail($id);

        if ($request->has('img')){
            $file = $request->file('img');
        if ($file->isValid()) {
                $old_file = $blog->img;
                $path = $this->storeImg('blogs' , $file , $old_file);
                $blog->img = $path;
         }else{
            session()->flash('alert', ['class' => 'danger', 'msg' => __('admin.AnErrorOccurred')]);
        }
        }


        return $this->extracted($request, $blog);
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $this->deleteImg($blog->img);
        $blog->delete();
        Cache::forget('blogs');
        session()->flash('alert', ['class' => 'success', 'msg' => __('admin.TheOpreationDoneSuccessFully')]);
        return redirect()->to(route('admin.blogs.index'));
    }

    /**
     * @param Request $request
     * @param $blog
     * @return \Illuminate\Http\RedirectResponse
     */
    public function extracted(Request $request, $blog): \Illuminate\Http\RedirectResponse
    {
        $blog->title = $request->title;
        $blog->intro = $request->intro;
        $blog->keywords = $request->keywords;
        $blog->categorey_id = $request->category;
        $blog->content = $request['content'];
        $blog->publish = $request->has('publish') ? 1 : 0;
        $blog->featured = $request->has('featured') ? 1 : 0;
        $blog->service = $request->has('service') ? 1 : 0;
        $blog->save();
        if ($blog->publish){
            $subscripers = Subscriber::all();
              if($blog->service){
                  $url = route('services.show' ,$blog->slug) ;
              }else{
                  $url = route('blogs.show' ,$blog->slug) ;
              }
                            
            foreach ($subscripers as $subscriper){
                $subscriper->notify(new NotifyUsersOfNewBlog($blog->title , $blog->intro , $url));
            }
        }
        Cache::forget('blogs');
        session()->flash('alert', ['class' => 'success', 'msg' => __('admin.TheOpreationDoneSuccessFully')]);
        return redirect()->to(route('admin.blogs.index'));
    }
}
