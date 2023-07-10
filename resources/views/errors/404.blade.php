@extends('layouts.app')
@section('title' , __('frontend.PageNotFound'))

@section('content')


    <!-- Start 404
    ============================================= -->
    <div class="error-page-area text-center default-padding">
        <div class="container">
            <div class="error-box">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h1>404</h1>
                        <h2>{{__('frontend.PageNotFound')}}</h2>

                        <a class="btn btn-theme effect btn-md" href="{{url('/')}}">{{__('frontend.BackToHome')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End 404 -->


@endsection
