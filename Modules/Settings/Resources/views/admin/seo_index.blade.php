@extends('admin.layout.base')

@section('title' , __('admin.SeoConfigrations'))

@section('toolbar')

    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">

        <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
        <!--begin::Title-->
        <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">{{__('admin.SeoConfigrations')}}</h1>
        <!--end::Title-->
        <!--begin::Separator-->
        <span class="h-20px border-gray-200 border-start mx-4"></span>
        <!--end::Separator-->
        <!--begin::Breadcrumb-->
        <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
            <!--begin::Item-->
            <li class="breadcrumb-item text-muted">
                <a href="{{route('admin.dashboard')}}" class="text-muted text-hover-primary">{{__('admin.Dashboard')}}</a>
            </li>
            <!--end::Item-->
            <!--begin::Item-->
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-200 w-5px h-2px"></span>
            </li>
            <!--end::Item-->
            <!--begin::Item-->
            <li class="breadcrumb-item text-dark">{{__('admin.SeoConfigrations')}}</li>
            <!--end::Item-->
        </ul>
        <!--end::Breadcrumb-->
    </div>

    </div>
@endsection

@section('content')

       	<div class="card">
        <!--begin::Card header-->
        <div class="card-header">
            <!--begin::Card title-->
            <div class="card-title fs-3 fw-bolder">{{__('admin.SeoConfigrations')}}</div>
            <!--end::Card title-->
        </div>
        <form method="POST" action="{{route('admin.seo.store')}}">
            <div class="card-body">
                       @csrf

                            <div class="row mb-8">
                                <!--begin::Col-->
                                <div class="col-xl-3">
                                    <div class="fs-6 fw-bold mt-2 mb-3"><i class="bi bi-translate text-primary mx-1 "></i>{{__('admin.WebsiteName')}}</div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-9 fv-row">
                                    <input type="text" class="form-control form-control-solid" name="data[website_name]" value="{{$seo->get('website_name')}}" placeholder="Avedi tech" />
                                </div>
                            </div>

                              <div class="row mb-8">
                            <!--begin::Col-->
                            <div class="col-xl-3">
                                <div class="fs-6 fw-bold mt-2 mb-3"><i class="bi bi-translate text-primary mx-1 "></i> {{__('admin.WebsiteDescription')}}</div>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-xl-9 fv-row">
                                <input type="text" class="form-control form-control-solid" name="data[website_desc]" value="{{$seo->get('website_desc')}}" placeholder="Avedi tech desc .." />
                            </div>
                        </div>

                       <div class="row mb-8">
                            <!--begin::Col-->
                            <div class="col-xl-3">
                                <div class="fs-6 fw-bold mt-2 mb-3"><i class="bi bi-translate text-primary mx-1 "></i>{{__('admin.WebsiteKeywords')}}</div>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-xl-9 fv-row">
                                <input type="text" class="form-control form-control-solid" name="data[website_keywords]" value="{{$seo->get('website_keywords')}}" placeholder="Avedi tech marketing web " />
                            </div>
                        </div>

                       <div class="row mb-8">
                            <!--begin::Col-->
                            <div class="col-xl-3">
                                <div class="fs-6 fw-bold mt-2 mb-3"><i class="bi bi-translate text-primary mx-1 "></i> {{__('admin.AboutUs')}}</div>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-xl-9 fv-row">
                                <input type="text" class="form-control form-control-solid" name="data[about_us]"  value="{{$seo->get('about_us')}}"  placeholder="Required honoured trifling eat pleasure man relation. Assurance yet bed was improving furniture man. " />
                            </div>
                        </div>

                       <div class="row mb-8">
                            <!--begin::Col-->
                            <div class="col-xl-3">
                                <div class="fs-6 fw-bold mt-2 mb-3"><i class="bi bi-translate text-primary mx-1 "></i>{{__('admin.WebsiteMainTitle')}}</div>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-xl-9 fv-row">
                                <input type="text" class="form-control form-control-solid" name="data[main_title]" value="{{$seo->get('main_title')}}" placeholder="Boots your website traffic today " />
                            </div>
                        </div>

                         <div class="row mb-8">
                            <!--begin::Col-->
                            <div class="col-xl-3">
                                <div class="fs-6 fw-bold mt-2 mb-3"><i class="bi bi-translate text-primary mx-1 "></i>{{__('admin.WebsiteSubTitle')}}</div>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-xl-9 fv-row">
                                <input type="text" class="form-control form-control-solid" name="data[sub_title]"  value="{{$seo->get('sub_title')}}" placeholder="Unwilling he departure elsewhere dejection at. " />
                            </div>
                        </div>

            </div>

                        <!--begin::Card footer-->
            <div class="card-footer d-flex justify-content-end py-6 px-9">
                <button type="reset" class="btn btn-light btn-active-light-primary me-2">{{__('admin.Discard')}}</button>
                <button type="submit" class="btn btn-primary" id="kt_project_settings_submit">{{__('admin.SaveChanges')}}</button>
            </div>
            <!--end::Card footer-->

            </form>
        </div>
@endsection

@section('script')

@endsection
