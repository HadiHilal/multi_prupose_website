@extends('layouts.app')
@section('title' , __('frontend.Blogs'))
@section('description' ,$seo->get('about'))
@section('keywords' , $seo->get('keywords'))
@section('site-img' , asset('storage/' . $settings->get('meta_img')))

@section('content')
    <!-- Start Breadcrumb ============================================= -->
    <div class="breadcrumb-area shadow dark bg-cover text-center text-light" style="background-image: url({{asset('storage/' . $settings->get('blog_bg'))}});">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h1>{{__('frontend.Blogs')}}</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{url('/')}}"><i class="fas fa-home"></i> {{__('frontend.Home')}}</a></li>
                        <li><a>{{__('frontend.Blogs')}}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <div class="blog-area full-blog default-padding">
        <div class="container">
            <div class="blog-items">
                <div class="blog-content">
                    <div class="blog-item-box">
                        <div class="row">
                            @foreach($blogs as $blog)
                            <!-- Single Item -->
                            <div class="col-lg-4 col-md-6 single-item">
                                <div class="item">
                                    <div class="thumb">
                                        <img src="{{asset('storage/' . $blog->img)}}" alt="Thumb">
                                        <div class="date">{{$blog->created_at->format('d M Y')}}</div>
                                    </div>
                                    <div class="info">
                                        <h4>
                                            <a href="{{route('blogs.show' , $blog->slug)}}">{{ Str::limit($blog->title, 38) }}</a>
                                        </h4>
                                        <div class="footer-meta">
                                           <ul>
                                               <li></li>
                                               <li>
                                                      <span>{{$blog->category->name}} </span>
                                               </li>
                                           </ul>
                                        </div>
                                        <p>
                                            {{ Str::limit($blog->intro, 125) }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Item -->
                            @endforeach
                        </div>
                        <!-- Pagination -->
                        <div class="row">
                            <div class="col-md-12 pagi-area text-center">
                                    {!! $blogs->links() !!}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
