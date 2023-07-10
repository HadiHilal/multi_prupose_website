@extends('layouts.app')
@section('title' , __('frontend.ThankYou'))
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
                    <h1>{{__('frontend.ThankYou')}}</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{url('/')}}"><i class="fas fa-home"></i> {{__('frontend.Home')}}</a></li>
                        <li><a>{{__('frontend.ThankYou')}}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <section class="container text-center mb-5">
          <img class="img-fluid m-auto" src="http://montco.happeningmag.com/wp-content/uploads/2014/11/thankyou.png" alt="thanks" />
           <h1 class="mb-3">{{__('frontend.ThankYouForYourTrust')}} </h1>
    </section>

@endsection
