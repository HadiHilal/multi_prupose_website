@extends('layouts.app')
@section('title' , __('frontend.Home'))
@section('description' ,$seo->get('website_desc'))
@section('keywords' , $seo->get('website_keywords'))
@section('site-img' , asset('storage/' . $settings->get('meta_img')))

@section('css')
    <style>
.pricing-area .pricing-header img {
    height: 150px!important;
    margin-top: 30px;
    width: 150px;
    margin-bottom: 20px;
    border-radius: 50%;
}
.main-services-box .item .icon i {
    font-size: 30px !important;
}

    </style>

@endsection
@section('content')
      <!-- Start Banner
    ============================================= -->
    <div class="banner-area circle-bg">
        <div class="item">
            <div class="box-table">
                <div class="box-cell">
                    <div class="container">
                        <div class="banner-items">
                            <div class="row align-center">
                                <div class="col-lg-6">
                                    <div class="content">
                                        <h1 class="wow fadeInDown h2" data-wow-duration="400ms">{{$seo->get('main_title')}}</h1>
                                        <p class="wow fadeInUp" data-wow-duration="500ms">
                                           {{$seo->get('sub_title')}}
                                        </p>
                                        <a href="{{route('pricing')}}" class="btn-animate wow  fadeInLeft" data-wow-duration="600ms">
                                            <span class="circle">
                                              <span class="icon arrow"></span>
                                            </span>
                                            <span class="button-text"> {{__('frontend.OurPackages')}}</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-6 thumb multi-items">
                                    <div class="thumb-box">
                                        <img class="wow fadeInDown" src="{{asset('storage/' . $settings->get('slide_img')) ?? '/public/front/img/illustration/dashboard.png'}}" alt="Dashbaord">
                                        <img class="wow fadeInUp" data-wow-delay="300ms" src="/public/front/img/illustration/man-1.png" alt="illustration">
                                        <img class="wow fadeInUp" data-wow-delay="800ms" src="/public/front/img/illustration/man-2.png" alt="illustration">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Banner -->

    <!-- Start Features
    ============================================= -->
    <div class="feature-area default-padding-bottom bottom-less">
         <!-- Shape -->
        <div class="fixed-bottom-shape">
           <img src="{{ asset('front/img/shape/19.png') }}" alt="Shape">

        </div>
        <!-- Shape -->
        <div class="container">
            <div class="feature-items text-center">
                <div class="row">
                        @foreach($services as $service)
                    <!-- Single Item -->
                    <div class="single-item col-lg-4 col-md-6">
                        <div class="item">
                            <div class="info">
                                <a href="{{route('services.show' , $service->slug)}}">   <h4>{{ Str::limit($service->title, 38) }}</h4> </a>
                                <p>
                                    {{ Str::limit($service->intro, 100) }}
                                </p>
                            </div>
                            <div class="icon">
                                <a href="{{route('services.show' , $service->slug)}}">  <img src="{{asset('storage/' . $service->img) }}" alt="service "> </a>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Item -->
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- End Features -->

    <!-- Star About
    ============================================= -->
    <div class="about-content-area bg-gray default-padding-bottom">
        <div class="container">
            <div class="row align-center">
                <div class="col-lg-6">
                    <div class="fun-fact-list">
                        <ul class="achivement">
                            <li>
                                <div class="fun-fact">
                                    <div class="counter">
                                        <div class="timer" data-to="80" data-speed="5000">90</div>
                                        <div class="operator">K</div>
                                    </div>
                                    <span class="medium"> {{ __('frontend.WorldCustomer') }}</span>
                                </div>
                            </li>
                            <li>
                                <div class="fun-fact">
                                    <div class="counter">
                                        <div class="timer" data-to="100" data-speed="5000">100</div>
                                        <div class="operator">%</div>
                                    </div>
                                    <span class="medium">{{ __('frontend.PositiveRating') }} </span>
                                </div>
                            </li>
                            <li>
                                <div class="fun-fact">
                                    <div class="counter">
                                        <div class="timer" data-to="50" data-speed="5000">50</div>
                                        <div class="operator">+</div>
                                    </div>
                                    <span class="medium">{{ __('frontend.Contract') }}</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1 info">
                    <div class="top-info">
                        <h2>{{ __('frontend.Trust') }}</h2>
                        <p>
                            {{ __('frontend.Working') }}
                        </p>
                        <div class="row align-center">
                            <div class="col-lg-6">
                                <ul>
                                    <li>{{ __('frontend.WeOffer') }}</li>
                                    <li>{{ __('frontend.FreeConsultations') }}</li>
                                    <li>{{ __('frontend.24/16hourSupport') }}</li>
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <h4>8<span>  {{ __('frontend.YearsOf') }}</span></h4>
                            </div>
                        </div>
                        <a class="btn-animation border dark" href="#happy" data-animation="animated slideInUp">{{ __('frontend.DiscoverMore') }} <i class="arrow_right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End About -->

    <!-- Star Main Services
    ============================================= -->
    <div class="main-services-area overflow-hidden shape-layout default-padding bottom-less">
        <div class="container">
            <div class="heading-left">
                <div class="row">
                    <div class="col-lg-5">
                        <h5>{{ __('frontend.WhyLayanMedia') }}</h5>
                        <h2>
                            {{ __('frontend.LetsCheck') }}
                        </h2>
                    </div>
                    <div class="col-lg-6 offset-lg-1">
                        <p>
                           {{ __('frontend.YouChoos') }}
                        </p>
                        <a class="btn circle btn-md btn-theme effect" href="{{route('services')}}">{{ __('frontend.DiscoverMore') }} <i class="fas fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="main-services-box">
                <div class="row">
                    <!-- Single Item -->
                    <div class="single-item col-lg-6 col-md-6">
                        <div class="item">
                            <div class="icon">
                                <i class="fab fa-codepen"></i>
                            </div>
                            <div class="info">
                                <h4><a href="#"> {{ __('frontend.ExperienceProfessionalism') }}</a></h4>
                                <p>
                                     {{ __('frontend.ExperienceProfessionalismText') }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Item -->
                    <!-- Single Item -->
                    <div class="single-item col-lg-6 col-md-6">
                        <div class="item">
                            <div class="icon">
                                <i class="fas fa-check"></i>
                            </div>
                            <div class="info">
                                <h4><a href="#">{{ __('frontend.CustomizedSolutions') }}</a></h4>
                                <p>
                                    {{ __('frontend.CustomizedSolutionsText') }}
                                    </p>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Item -->
                    <!-- Single Item -->
                    <div class="single-item col-lg-6 col-md-6">
                        <div class="item">
                            <div class="icon">
                               <i class="fas fa-address-card"></i>
                            </div>
                            <div class="info">
                                <h4><a href="#">{{ __('frontend.AttentionDetails') }}</a></h4>
                                <p>
                                    {{ __('frontend.AttentionDetailsText') }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Item -->
                    <!-- Single Item -->
                    <div class="single-item col-lg-6 col-md-6">
                        <div class="item">
                            <div class="icon">
                               <i class="fas fa-search"></i>
                            </div>
                            <div class="info">
                                <h4><a href="#">{{ __('frontend.AnalysisEvaluation') }}</a></h4>
                                <p>
                                    {{ __('frontend.AnalysisEvaluationText') }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Item -->

                </div>
            </div>
        </div>
    </div>
    <!-- End Main Services Area -->



{{--    <!-- Star Faq--}}
{{--    ============================================= -->--}}
{{--    <div class="faq-area default-padding-bottom">--}}
{{--        <div class="container">--}}
{{--            <div class="faq-items">--}}
{{--                <div class="row">--}}

{{--                    <div class="col-lg-6 info">--}}
{{--                        <h2>We Are Happy to Assist <br> You all Time Moment</h2>--}}
{{--                        <p>--}}
{{--                            Mirth his quick its set front enjoy hoped had there. Who connection imprudence middletons too but increasing celebrated principles joy. Herself too improve gay winding ask expense are compact.--}}
{{--                        </p>--}}
{{--                        <ul>--}}
{{--                            <li>Date Exchange</li>--}}
{{--                            <li>Content Managment</li>--}}
{{--                            <li>Workflow</li>--}}
{{--                            <li>Business Digital</li>--}}
{{--                        </ul>--}}
{{--                        <a class="btn btn-md btn-theme effect" href="#">Get Started</a>--}}
{{--                    </div>--}}

{{--                    <div class="col-lg-6">--}}
{{--                        <div class="faq-content">--}}
{{--                            <div class="accordion" id="accordionExample">--}}
{{--                                <div class="card">--}}
{{--                                    <div class="card-header" id="headingOne">--}}
{{--                                        <h4 class="mb-0" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">--}}
{{--                                              Where can I get analytics help?--}}
{{--                                        </h4>--}}
{{--                                    </div>--}}

{{--                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">--}}
{{--                                        <div class="card-body">--}}
{{--                                            <p>--}}
{{--                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui consectetur at, sunt maxime, quod alias ullam officiis, ex necessitatibus similique odio aut! Provident, adipisci esse vero magni necessitatibus quisquam commodi.--}}
{{--                                            </p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="card">--}}
{{--                                    <div class="card-header" id="headingTwo">--}}
{{--                                        <h4 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">--}}
{{--                                              How much does data analytics costs?--}}
{{--                                        </h4>--}}
{{--                                    </div>--}}
{{--                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">--}}
{{--                                        <div class="card-body">--}}
{{--                                            <p>--}}
{{--                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel, illum earum nobis dolorum aliquid! Quos pariatur ipsam eum voluptates. Illum provident consequatur non aut labore, voluptates repudiandae maxime cum dolorem.--}}
{{--                                            </p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="card">--}}
{{--                                    <div class="card-header" id="headingThree">--}}
{{--                                        <h4 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">--}}
{{--                                          What kind of data is needed for analysis?--}}
{{--                                      </h4>--}}
{{--                                    </div>--}}
{{--                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">--}}
{{--                                        <div class="card-body">--}}
{{--                                            <p>--}}
{{--                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum iure accusamus ea, reprehenderit aspernatur deleniti corporis ad perspiciatis. Magnam sit enim animi, esse deleniti nobis quaerat veniam suscipit odit officiis.--}}
{{--                                            </p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!-- End Faq -->--}}

    <!-- Start Pricing Area
    ============================================= -->
    <div class="pricing-area default-padding-bottom">
        <!-- Fixed Shape -->
        <div class="fixed-shape-bottom">
            <img src="{{ asset('front/img/shape/19.png') }}" alt="Shape">

        </div>
        <!-- End Fixed Shape -->
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="heading-center text-center">
                        <h5>{{__('frontend.OurPackages')}}</h5>
                        <h2>{{__('frontend.TakeLookOfPricing')}}</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="pricing pricing-simple text-center">
                <div class="row">

                    @foreach($plans as $key => $plan)
                         <div class="col-lg-4 col-md-6 single-item">
                        <div class="pricing-item {{$key == 1 ? 'active' : ''}}">
                            <div class="pricing-header">
                                <h4>{{$plan->name}}</h4>
                                <img class="img-fluid mb-3" height="35" src="{{asset('storage/' . $plan->img)}}" alt="{{$plan->title}}"/>
                                <h2 class="mt-2"><sup>$</sup>{{$plan->price}} <sub>/ {{$plan->duration}}</sub></h2>
                            </div>
                            <ul>
                                @foreach($plan->features as $item)
                                <li>{{$item->name}} {!!  $item->included ? '<i class="fas fa-check-circle"></i>' : ' <i class="fas fa-times-circle"></i>'!!} </li>
                                @endforeach
                            </ul>
                            <div class="pricing-footer">
                                <a class="btn circle btn-theme effect btn-sm" href="https://api.whatsapp.com/send?phone={{$settings->get('whatsapp')}}?&text=i want to ask you about this plan {{$plan->title}}">{{__('frontend.Buy')}} <i class="fab fa-whatsapp mx-1"></i> </a>
                            </div>
                        </div>
                    </div>
                    @endforeach


                </div>
            </div>
        </div>
    </div>
    <!-- End Pricing Area -->

    <!-- Star Testimonials
    ============================================= -->
    <div class="testimonials-area default-padding" id="happy">
        <div class="container">
            <div class="testimonial-items text-center">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="heading">
                            <h2>{{__('frontend.HappyCustomers')}}</h2>
                        </div>
                        <div class="testimonials-carousel owl-carousel owl-theme">
                            @foreach($testimonials as $item)
                            <div class="item">
                                <p>
                                   {{$item->comment}}
                                </p>
                                <div class="thumb-box">
                                    <div class="thumb">
                                       <a href="{{$item->link}}">
                                           <img src="{{asset('storage/' .$item->img)}}" alt="{{$item->name}}">
                                       </a>
                                    </div>
                                </div>
                                <h5> {{$item->name}}</h5>
                                <span>{{$item->position}}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Testimonials -->

    <!-- Star Blog
    ============================================= -->
    <div class="blog-area bg-gray blog-standard default-padding bottom-less">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="heading-center text-center">
                        <h5>{{__('frontend.LatestNews')}}</h5>
                        <h2>{{__('frontend.MostPopularBreakingBlogs')}}</h2>
                    </div>
                </div>
            </div>
            <div class="blog-items">
                <div class="row">
                    @foreach($blogs as $blog)
                                   <!-- Single Item -->
                    <div class="col-lg-4 col-md-6 single-item thumb-less">
                        <div class="item">
                            <div class="date">{{$blog->created_at->format('d M Y')}}</div>
                            <h4>
                                <a href="{{route('blogs.show' , $blog->slug)}}">{{ Str::limit($blog->title, 38) }}</a>
                            </h4>
                            <p>
                                {{ Str::limit($blog->intro, 100) }}
                            </p>
                            <div class="footer-meta">
                               <ul>
                                   <li>
                                   </li>
                                   <li>
                                       <span>{{$blog->category->name}} </span>
                                   </li>
                               </ul>
                            </div>
                                <div class="icon">
                                <a href="{{route('blogs.show' , $blog->slug)}}">  <img src="{{asset('storage/' . $blog->img) }}" alt="service "> </a>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Item -->
                    @endforeach


                </div>
            </div>
        </div>
    </div>
    <!-- End Blog -->
@endsection
