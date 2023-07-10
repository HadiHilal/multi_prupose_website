@extends('layouts.app')
@section('title' , $service->title)
@section('description' ,$service->intro)
@section('keywords' , $service->keywords)
@section('site-img' , asset('storage/' . $service->img))

@section('content')
    <!-- Start Breadcrumb ============== -->
    <div class="breadcrumb-area shadow dark bg-cover text-center text-light" style="background-image: url({{asset('storage/' . $settings->get('services_bg'))}});">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h1>{{ $service->title}}</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{url('/')}}"><i class="fas fa-home"></i> {{__('frontend.Home')}}</a></li>
                        <li><a href="{{route('services')}}">{{__('frontend.OurServices')}}</a></li>
                        <li><a href="#">{{$service->title}}</a></li>
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
                                    <img src="{{asset('storage/' . $service->img)}}" alt="Blog Image">
                                    <div class="date">{{$service->created_at->format('d M Y')}}</div>
                                </div>
                                <!-- Start Post Thumb -->

                                <div class="info">
                                    <h3>{{ $service->title}}</h3>

                                    <div class="footer-meta">
                                       <ul>
                                           <li>
                                               @auth()
                                                   @if(auth()->user()->type ==='admin')
                                                       @can('edit blogs')
                                                           <a href="{{route('admin.blogs.edit' , $service->id)}}" target="_blank" class="btn btn-sm btn-warning">
                                                               {{__('admin.EditService')}}
                                                           </a>
                                                       @endcan
                                                   @endif
                                               @endauth
                                           </li>
                                           <li>
                                             <span>{{$service->category->name}} </span>
                                           </li>
                                       </ul>
                                    </div>

                                    {!! $service->content !!}
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
