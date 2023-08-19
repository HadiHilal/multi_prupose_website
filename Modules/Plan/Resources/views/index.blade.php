@extends('layouts.app')
@section('title' , __('frontend.OurPackages'))
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
    </style>
    @endsection
@section('content')


    <!-- Start Breadcrumb
    ============================================= -->
    <div class="breadcrumb-area shadow dark bg-cover text-center text-light" style="background-image: url({{asset('storage/' . $settings->get('pricing_bg'))}});">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h1>{{__('frontend.OurPackages')}}</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{url('/')}}"><i class="fas fa-home"></i> {{__('frontend.Home')}}</a></li>
                        <li><a>{{__('frontend.OurPackages')}}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

<div class="pricing-area default-padding">
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



@endsection
