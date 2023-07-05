<?php

namespace Modules\Dashboard\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Modules\Blog\Entities\Blog;
use Modules\Contact\Entities\Contact;
use Modules\Plan\Entities\Plan;
use Modules\Subscriber\Entities\Subscriber;

class AdminController extends Controller
{
   /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $blogs_count = Blog::count();
        $plans_count = Plan::count();
        $contact_count = Contact::count();
        $users_count = User::where('type' , 'user')->count();
        $admins_count = User::where('type' , 'admin')->count();
        $subscripers_count = Subscriber::count();
        return view('dashboard::admin.index' , compact('blogs_count' , 'contact_count' , 'users_count' , 'admins_count' , 'subscripers_count' , 'plans_count')) ;
    }
}
