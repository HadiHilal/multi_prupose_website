<?php

namespace Modules\Site\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;
use Modules\Blog\Entities\Blog;
use Modules\Blog\Entities\BlogView;
use Modules\Plan\Entities\Plan;
use Modules\Settings\Entities\Seo;
use Modules\Settings\Entities\Settings;
use Modules\Testimonial\Entities\Testimonial;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $blogs = Cache::get('blogs');
        if (!$blogs){
            $blogs   = Blog::with('category')->where('publish' , 1)->where('featured' , 1)->limit(3)->get();
            Cache::put('blogs' , $blogs);
        }

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

        $testimonials = Cache::get('testimonials');
        if (!$testimonials){
            $testimonials   = Testimonial::where('publish' , 1)->get();
            Cache::put('testimonials' , $testimonials);
        }
        $home = 'active';
        return view('site::index' , compact('settings' , 'seo' , 'blogs' , 'plans' , 'testimonials' , 'home'));
    }

      /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function services()
    {


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

        $index_services = 'active';
        $services   = Blog::with('category')->where('publish' , 1)->where('service' , 1)->orderByDesc('created_at')->paginate(30);

        return view('site::services' , compact('settings' , 'seo' , 'index_services' , 'services'));
    }

       public function show_services($slug)
        {

        $service= Blog::where('slug' , $slug)->where('publish' , 1)->where('service' , 1)->first();
         if (is_null($service)){
             abort(404);
         }

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

        $index_services = 'active';

        $check_user = BlogView::where('ip' , request()->ip())->where('blog_id' , $service->id)->first();
        if (is_null($check_user)) {
            $view = new BlogView();
            $view->ip = request()->ip();
            $view->blog_id = $service->id;
            $view->total_views = 1;
            $view->save();
        }
        return view('site::service_show' , compact('settings' , 'seo' , 'index_services' , 'service'));
    }

}
