<?php

namespace Modules\Blog\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Modules\Blog\Entities\Blog;
use Modules\Blog\Entities\BlogView;
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
        $index_blogs = 'active';
        $blogs   = Blog::with('category')->where('publish' , 1)->where('service' , 0)->orderByDesc('created_at')->paginate(30);
        return view('blog::index' , compact('settings' , 'seo' , 'index_blogs' , 'blogs' ));

    }

    public function show($slug){
         $index_blogs = 'active';
         $blog = Blog::where('slug' , $slug)->where('publish' , 1)->where('service' , 0)->first();
         if (is_null($blog)){
             abort(404);
         }
         $previous = Blog::where('id' , '<', $blog->id)->where('categorey_id' , $blog->categorey_id)->select('title' , 'slug')->where('publish' , 1)->first();
         $next = Blog::where('id' , '>', $blog->id)->where('categorey_id' , $blog->categorey_id)->select('title' , 'slug')->where('publish' , 1)->first();
         $settings = Cache::get('settings');
        if (!$settings){
            $settings   = Settings::all()->pluck('value' , 'key');
            Cache::put('settings' , $settings);
        }

        $check_user = BlogView::where('ip' , request()->ip())->where('blog_id' , $blog->id)->first();
        if (is_null($check_user)) {
            $view = new BlogView();
            $view->ip = request()->ip();
            $view->blog_id = $blog->id;
            $view->total_views = 1;
            $view->save();
        }

         return view('blog::show' , compact('previous', 'next' , 'index_blogs' , 'blog' , 'settings'));
    }
}
