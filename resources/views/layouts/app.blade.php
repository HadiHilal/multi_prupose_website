@php
 $seo = \Modules\Settings\Entities\Seo::pluck('value' ,'key');
@endphp
<!DOCTYPE html>
<html lang="{{ App::currentLocale() }}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
<!--- this app powered by hadi hilal
   https://www.linkedin.com/in/hadi-hilal-5793a5200
   --->
<head>
    <!-- ========== Meta Tags ========== -->
    <title>{{$seo->get('website_name')}} | @yield('title')</title>
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="@yield('description')" />
    <meta name="keywords" content=" @yield('keywords')" />
    <meta name="audience" content="all" />
    <meta name="robots" content="index, follow" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="author" content="{{$seo->get('website_name')}}" />
    <meta name="copyright" content="{{$seo->get('website_name')}}" />
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"/>

    {{--  twiiter tags   --}}
    <meta property="og:type" content="website" />
    <meta property="og:title" content="@yield('title')" />
    <meta property="og:description" content="@yield('description')" />
    <meta property="og:image" content="@yield('site-img')" />
    <meta property="og:url" content="{{url()->current()}}" />
    <meta property="og:site_name" content="{{$seo->get('website_name')}}" />

    <meta name="twitter:card" content="summary">
{{--    <meta name="twitter:site" content="@address_tr">--}}
{{--    <meta name="twitter:creator" content="@address_tr">--}}
    <meta name="twitter:title" content="@yield('title')" />
    <meta name="twitter:description" content="@yield('description')" />
    <meta name="twitter:image" content="@yield('site-img')" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="canonical" href="{{url()->current()}}" />
    <meta http-equiv="content-language" content="{{app()->getLocale()}}">

    <link rel="icon" href="{{ asset('imgs/favicon.ico') }}" type="image/x-icon">
<link rel="shortcut icon" href="{{ asset('imgs/favicon.ico') }}" type="image/x-icon">

<!-- ========== Start Stylesheet ========== -->
<link href="{{ asset('front/css/bootstrap.min.css') }}" rel="stylesheet" />
<link href="{{ asset('front/css/font-awesome.min.css') }}" rel="stylesheet" />
<link href="{{ asset('front/css/themify-icons.css') }}" rel="stylesheet" />
<link href="{{ asset('front/css/flaticon-set.css') }}" rel="stylesheet" />
<link href="{{ asset('front/css/elegant-icons.css') }}" rel="stylesheet" />

<link href="{{ asset('front/css/owl.carousel.min.css') }}" rel="stylesheet" />
<link href="{{ asset('front/css/owl.theme.default.min.css') }}" rel="stylesheet" />
<link href="{{ asset('front/css/animate.css') }}" rel="stylesheet" />
<link href="{{ asset('front/css/bootsnav.css') }}" rel="stylesheet" />
<link href="{{ asset('front/css/style.css') }}" rel="stylesheet">
<link href="{{ asset('front/css/responsive.css') }}" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    @if(App::currentLocale() == 'ar')
   <link href="{{ asset('front/css/rtl.css') }}" rel="stylesheet" />

    @endif
    <style>
        nav.navbar.bootsnav ul.nav > li.active > a {
            background-color: unset!important;
        }
    </style>
    @yield('css')

     {!! $settings->get('header_scripts') !!}
</head>

<body>

    <header id="home">

        <!-- Start Navigation -->
        <nav class="navbar navbar-default navbar-fixed dark no-background bootsnav">

            <!-- Start Top Search -->

            <!-- End Top Search -->

            <div class="container-full">

                <!-- Start Atribute Navigation -->

                <!-- End Atribute Navigation -->

                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="{{url('/')}}">
                        <img src="{{asset('storage/' . $settings->get('black_logo'))}}" style="height:75px" class="logo" alt="Logo">
                    </a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav navbar-center" data-in="fadeInDown" data-out="fadeOutUp">
                         @if(app()->getLocale() === 'ar')
                    <li>
                         <a  rel="alternate" hreflang="en" href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}">
                           En
                         </a>
                        </li>
                        @else
                    <li>
                        <a  rel="alternate" hreflang="ar" href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}">
                               AR
                        </a>
                         </li>

                        @endif

                        <li class="@if(isset($home)) active @endif"><a href="{{url('/')}}">{{__('frontend.Home')}}</a></li>
                        <li class="@if(isset($pricing)) active @endif"><a href="{{route('pricing')}}">{{__('frontend.OurPackages')}}</a></li>
                        <li class="@if(isset($index_services)) active @endif"><a href="{{route('services')}}">{{__('frontend.OurServices')}}</a></li>
                        <li class="@if(isset($index_blogs)) active @endif"><a href="{{route('blogs.index')}}">{{__('frontend.Blogs')}}</a></li>
                        <li class="@if(isset($contact)) active @endif"><a href="{{route('contact')}}">{{__('frontend.ContactUs')}}</a></li>
                        @auth()
                            @if(auth()->user()->type == 'admin')
                             <li><a href="{{route('admin.dashboard')}}">{{__('frontend.AdminPanel')}}</a></li>
                            @endif
                        @endauth
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div>

            <!-- Start Side Menu -->
            <div class="side">
                <a href="#" class="close-side"><i class="icon_close"></i></a>
                <div class="widget">

                    <img src="{{asset('storage/' . $settings->get('black_logo'))}}" class="logo" alt="Logo">
                    <p>
                        {{$seo->get('about_us')}}
                    </p>
                </div>
                <div class="widget address">
                    <div>
                        <ul>
                            <li>
                                <div class="content">
                                    <p>{{__('frontend.Address')}}</p>
                                    <strong>{{$settings->get('address')}}</strong>
                                </div>
                            </li>
                            <li>
                                <div class="content">
                                      <p>{{__('frontend.Email')}}</p>
                                    <strong>{{$settings->get('email')}}</strong>
                                </div>
                            </li>
                            <li>
                                <div class="content">
                                    <p>{{__('frontend.Phone')}}</p>
                                    <strong>{{$settings->get('whatsapp')}}</strong>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="widget newsletter">
                    <h4 class="title">{{__('frontend.SubscribeInOurNewsletter')}}</h4>
                    <form action="{{route('subscribe')}}" method="POST">
                        @csrf
                        <div class="input-group stylish-input-group">
                            <input type="email" placeholder="{{__('frontend.EnterEmail')}}l" value="{{old('email')}}" class="form-control" name="email">
                            <span class="input-group-addon">
                                <button type="submit">
                                    <i class="arrow_right"></i>
                                </button>
                            </span>
                        </div>
                    </form>
                </div>
                <div class="widget social">
                    <ul class="link">
                        <x-social :settings="$settings"></x-social>

                    </ul>
                </div>
            </div>
            <!-- End Side Menu -->

        </nav>
        <!-- End Navigation -->

    </header>
    <!-- End Header -->

    @yield('content')

   <!-- Star Footer
    ============================================= -->
    <footer class="bg-main text-light">
        <div class="container">
            <div class="f-items default-padding">
                <div class="row">
                    <div class="col-lg-6 col-md-6 item">
                        <div class="f-item about">
                            <h4 class="widget-title">{{__('frontend.AboutUs')}}</h4>
                            <p>
                                {{$seo->get('about_us')}}
                            </p>
                            <div class="social">
                                <ul>

                                    <li class="twitter"><a href="{{$settings->get('whatsapp')}}" target="_blank"><i class="fab fa-whatsapp"></i></a></li>
                                    <li class="facebook"><a href="{{$settings->get('facebook')}}" target="_blank" ><i class="fab fa-facebook-f"></i></a></li>
                                    <li class="instagram"><a href="{{$settings->get('instagram')}}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                    <li class="twitter"><a href="{{$settings->get('linkedin')}}" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 item">
                        <div class="f-item link">
                            <h4 class="widget-title">{{__('admin.QuickLinks')}}</h4>
                            <ul>
                                <li>
                                    <a href="{{route('blogs.index')}}">{{__('frontend.Blogs')}}</a>
                                </li>
                                  <li>
                                    <a href="{{route('pricing')}}">{{__('frontend.OurPackages')}}</a>
                                </li>

                                  <li>
                                    <a href="{{route('contact')}}">{{__('frontend.ContactUs')}}</a>
                                </li>

                                 <li>
                                    <a rel="noflow" href="{{route('login')}}">{{__('frontend.SignIn')}}</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 item">
                        <div class="f-item contact">
                            <h4 class="widget-title">{{__('frontend.ContactUs')}}</h4>
                            <div class="address">
                                <ul>
                                    <li>
                                        <p>{{__('frontend.Email')}}</p>
                                        <strong>{{$settings->get('email')}}</strong>
                                    </li>
                                    <li>
                                        <p>{{__('frontend.Phone')}}</p>
                                        <strong>{{$settings->get('whatsapp')}}</strong>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="row align-center">
                    <div class="col-lg-4">
                        <p>{{__('frontend.RightReservered')}} &copy;  {{__('frontend.PoweredBy')}} <a target="_blank" href="https://www.linkedin.com/in/hadi-hilal-5793a5200"> Hadi Hilal</a> </p>
                    </div>
                    <div class="col-lg-4 text-center logo">
                        <a href="#"><img style="height:75px" src="{{asset('storage/' . $settings->get('white_logo'))}}" alt="Logo"></a>
                    </div>
                    <div class="col-lg-4 text-right newsletter">
                        <form action="#">
                            <div class="input-group stylish-input-group">
                                <input type="email" placeholder="Enter your e-mail" class="form-control" name="email">
                                <span class="input-group-addon">
                                    <button type="submit">
                                        <i class="fa fa-paper-plane"></i>
                                    </button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer-->

    <script src="{{ asset('front/js/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('front/js/popper.min.js') }}"></script>
    <script src="{{ asset('front/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('front/js/jquery.appear.js') }}"></script>
    <script src="{{ asset('front/js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('front/js/modernizr.custom.13711.js') }}"></script>
    <script src="{{ asset('front/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('front/js/wow.min.js') }}"></script>
    <script src="{{ asset('front/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('front/js/count-to.js') }}"></script>
    <script src="{{ asset('front/js/bootsnav.js') }}"></script>
    <script src="{{ asset('front/js/main.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
     @yield('js')
    {!! $settings->get('body_scripts') !!}
    <script>
        @if (session('success'))
        toastr.success('{{ session('success') }}');
        @elseif (session('error'))
        toastr.error('{{ session('error') }}');
        @endif
    </script>
    @if ($errors->any())
    <script>
        @foreach ($errors->all() as $error)
            toastr.error('{{ $error }}');
        @endforeach
    </script>
@endif

</body>
</html>
