@extends('layouts.app')
@section('title' , __('frontend.ContactUs'))
@section('description' ,$seo->get('about'))
@section('keywords' , $seo->get('keywords'))
@section('site-img' , asset('storage/' . $settings->get('meta_img')))

@section('content')


    <!-- Start Breadcrumb
    ============================================= -->
    <div class="breadcrumb-area shadow dark bg-cover text-center text-light" style="background-image: url({{asset('storage/' . $settings->get('contact_us_bg'))}});">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h1>{{__('frontend.ContactUs')}}</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{url('/')}}"><i class="fas fa-home"></i> {{__('frontend.Home')}}</a></li>
                        <li><a>{{__('frontend.ContactUs')}}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Star Contact Area
    ============================================= -->
    <div class="contact-area overflow-hidden default-padding">
        <div class="container">
            <div class="contact-items">
                <!-- Fixed BG -->
                <div class="fixed-bg left">
                    <img src="/front/img/shape/39.png" alt="Shape">
                </div>
                <!-- Fixed BG -->
                <div class="row align-center">

                    <div class="col-lg-6 contact-box">
                        <div class="form-items">
                            <h2>{{__('frontend.ContactUs')}}</h2>
                            <form action="{{route('send_message')}}" method="POST" class="contact-form">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input class="form-control" id="name" name="name" value="{{old('name')}}" placeholder="Name*" type="text">

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input class="form-control" id="email" name="email" value="{{old('email')}}" placeholder="Email" type="email">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input class="form-control" id="phone" name="phone" value="{{old('phone')}}" placeholder="Phone*" type="text">
                                        </div>
                                    </div>
                                </div>

                                     <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input class="form-control" id="subject" name="subject" value="{{old('subject')}}" placeholder="subject" type="text">

                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group comments">
                                            <textarea class="form-control" id="comments" name="message" placeholder="Tell Us About Project *">{{old('message')}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <button class="btn-animation dark border" type="submit" name="submit" id="submit">
                                           {{__('frontend.SendMessage')}} <i class="arrow_right"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- Alert Message -->
                                <div class="col-lg-12 alert-notification">
                                    <div id="message" class="alert-msg"></div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-lg-5 offset-lg-1 left-info">
                        <div class="info-items text-light">
                            <!-- Single Item -->
                            <div class="item">
                                <div class="icon">
                                    <i class="flaticon-location"></i>
                                </div>
                                <div class="info">
                                    <h5>{{__('frontend.Address')}}</h5>
                                    <p>
                                       {{$settings->get('address')}}
                                    </p>
                                </div>
                            </div>
                            <!-- End Single Item -->
                            <!-- Single Item -->
                            <div class="item">
                                <div class="icon">
                                    <i class="flaticon-telephone"></i>
                                </div>
                                <div class="info">
                                    <h5>{{__('frontend.Phone')}}</h5>
                                    <p>
                                       {{$settings->get('whatsapp')}}
                                    </p>
                                </div>
                            </div>
                            <!-- End Single Item -->
                            <!-- Single Item -->
                            <div class="item">
                                <div class="icon">
                                    <i class="flaticon-email"></i>
                                </div>
                                <div class="info">
                                    <h5>{{__('frontend.Email')}}</h5>
                                    <p>
                                        {{$settings->get('email')}}
                                    </p>
                                </div>
                            </div>
                            <!-- End Single Item -->
                            <ul class="social">
                                  <x-social :settings="$settings"></x-social>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- End Contact Area -->


@endsection
