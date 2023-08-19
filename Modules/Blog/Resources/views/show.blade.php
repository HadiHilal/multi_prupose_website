@extends('layouts.app')
@section('title' , $blog->title)
@section('description' ,$blog->intro)
@section('keywords' , $blog->keywords)
@section('site-img' , asset('storage/' . $blog->img))

@section('content')
    <!-- Start Breadcrumb ============== -->
    <div class="breadcrumb-area shadow dark bg-cover text-center text-light" style="background-image: url({{asset('storage/' . $settings->get('blog_bg'))}});">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h1>{{ $blog->title}}</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{url('/')}}"><i class="fas fa-home"></i> {{__('frontend.Home')}}</a></li>
                        <li><a href="{{route('blogs.index')}}">{{__('frontend.Blogs')}}</a></li>
                        <li><a href="#">{{$blog->title}}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>



    <div class="blog-area single full-blog full-blog default-padding">
        <div class="container">
            <div class="blog-items">
                <div class="row">
                    <div class="blog-content col-lg-10 offset-lg-1 col-md-12">
                        <div class="blog-item-box">

                            <div class="item">
                                <!-- Start Post Thumb -->
                                <div class="thumb">
                                    <img src="{{asset('storage/' . $blog->img)}}" alt="Blog Image">
                                    <div class="date">{{$blog->created_at->format('d M Y')}}</div>
                                </div>
                                <!-- Start Post Thumb -->

                                <div class="info">
                                    <h3>{{ $blog->title}}</h3>

                                    <div class="footer-meta">
                                       <ul>
                                           <li>
                                               @auth()
                                                   @if(auth()->user()->type ==='admin')
                                                       @can('edit blogs')
                                                           <a href="{{route('admin.blogs.edit' , $blog->id)}}" target="_blank" class="btn btn-sm btn-warning">
                                                               {{__('admin.EditBlog')}}
                                                           </a>
                                                       @endcan
                                                   @endif
                                               @endauth
                                           </li>
                                           <li>
                                             <span>{{$blog->category->name}} </span>
                                           </li>
                                       </ul>
                                    </div>

                                    {!! $blog->content !!}
                                </div>
                            </div>
                        </div>

                        <!-- Start Post Pagination -->
                        <div class="post-pagi-area">
                            @if(!is_null($previous))
                            <a href="{{route('blogs.show' , $previous->slug)}}">
                                <i class="fas fa-angle-double-left"></i> {{__('frontend.PreviousPost')}}
                                   <h5>{{Str::limit($previous->title, 30)}}</h5>
                            </a>
                            @else
                                <a></a>
                             @endif
                            @if(!is_null($next))
                            <a href="{{route('blogs.show' , $next->slug)}}">
                              {{__('frontend.NextPost')}}  <i class="fas fa-angle-double-right"></i>
                                <h5>{{Str::limit($next->title, 30)}}</h5>
                            </a>
                            @else
                                <a></a>
                             @endif
                        </div>
                        <!-- End Post Pagination -->


                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
