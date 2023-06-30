<?php

namespace Modules\Dashboard\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;

class AdminController extends Controller
{
   /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {

        return view('dashboard::admin.index');
    }
}
