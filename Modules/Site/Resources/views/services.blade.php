@extends('layouts.app')
@section('title' , __('frontend.OurServices'))
@section('description' ,$seo->get('website_desc'))
@section('keywords' , $seo->get('website_keywords'))
@section('site-img' , asset('storage/' . $settings->get('meta_img')))

@section('content')

        <!-- Start Breadcrumb
    ============================================= -->
    <div class="breadcrumb-area shadow dark bg-cover text-center text-light" style="background-image: url({{asset('storage/' . $settings->get('services_bg'))}});">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h1>{{__('frontend.OurServices')}}</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{url('/')}}"><i class="fas fa-home"></i> {{__('frontend.Home')}}</a></li>
                        <li><a>{{__('frontend.OurServices')}}</a></li>
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
                            @foreach($services as $service)
                            <!-- Single Item -->
                            <div class="col-lg-4 col-md-6 single-item">
                                <div class="item">
                                    <div class="thumb">
                                        <img src="{{asset('storage/' . $service->img)}}" alt="Thumb">
                                        <div class="date">{{$service->created_at->format('d M Y')}}</div>
                                    </div>
                                    <div class="info">
                                        <h4>
                                            <a href="{{route('services.show' , $service->slug)}}">{{ Str::limit($service->title, 38) }}</a>
                                        </h4>
                                        <div class="footer-meta">
                                           <ul>
                                               <li></li>
                                               <li>
                                                      <span>{{$service->category->name}} </span>
                                               </li>
                                           </ul>
                                        </div>
                                        <p>
                                            {{ Str::limit($service->intro, 125) }}
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
                                    {!! $services->links() !!}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
