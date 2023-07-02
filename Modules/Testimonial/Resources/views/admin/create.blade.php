@extends('admin.layout.base')

@section('title' , __('admin.NewTestimonial'))

@section('toolbar')

    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">

        <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
        <!--begin::Title-->
        <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">{{__('admin.NewTestimonial')}}</h1>
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
            <li class="breadcrumb-item text-dark">{{__('admin.NewTestimonial')}}</li>
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
            <div class="card-title fs-3 fw-bolder">{{__('admin.NewTestimonial')}}</div>
            <!--end::Card title-->
        </div>
        <!--end::Card header-->
        <!--begin::Form-->
        <form id="kt_project_settings_form" class="form" method="post" action="{{ route('admin.testimonials.store') }}" enctype="multipart/form-data">
            @csrf
            <!--begin::Card body-->
            <div class="card-body">
                <!--begin::Row-->
                <div class="row mb-10">

                                        <!--begin::Col-->
                    <div class="col-xl-3">
                        <div class="fs-6 fw-bold mt-2 mb-3">{{__('admin.ClientImage')}} <span class="text-danger">*</span></div>
                    </div>

                    <!--begin::Col-->
                    <div class="col-xl-9 fv-row">
                        <!--begin::Image input-->
                        <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('/admin/media/avatars/blank.png')">
                            <!--begin::Preview existing avatar-->
                            <div class="image-input-wrapper w-125px h-125px bgi-position-center" style="background-size: 75%; background-image: url('/admin/media/avatars/blank.png')"></div>
                            <!--end::Preview existing avatar-->
                            <!--begin::Label-->
                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                <i class="bi bi-pencil-fill fs-7"></i>
                                <!--begin::Inputs-->
                                <input type="file" name="img" accept=".png, .jpg, .jpeg" />
                                <input type="hidden" name="avatar_remove" />
                                <!--end::Inputs-->
                            </label>
                            <!--end::Label-->
                            <!--begin::Cancel-->
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                            <!--end::Cancel-->
                            <!--begin::Remove-->
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                            <!--end::Remove-->
                        </div>
                        <!--end::Image input-->
                        <!--begin::Hint-->
                        <div class="form-text"> 250px * 250px </div>
                             <div class="fv-plugins-message-container invalid-feedback">
                                 <x-input-error class="mt-2" :messages="$errors->get('img')" />
                            </div>
                        <!--end::Hint-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->


                <!--begin::Row-->
                <div class="row mb-8">
                    <!--begin::Col-->
                    <div class="col-xl-3">
                        <div class="fs-6 fw-bold mt-2 mb-3"><i class="bi bi-translate text-primary mx-1 "></i>{{__('admin.ClientName')}} <span class="text-danger">*</span></div>
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-xl-9 fv-row">
                        <input type="text" class="form-control form-control-solid" name="name" value="{{old('name')}}" placeholder="Jone Doe" />
                               <div class="fv-plugins-message-container invalid-feedback">
                                 <x-input-error class="mt-2" :messages="$errors->get('name')" />
                            </div>
                    </div>
                </div>
                <!--end::Row-->

                     <!--begin::Row-->
                <div class="row mb-8">
                    <!--begin::Col-->
                    <div class="col-xl-3">
                        <div class="fs-6 fw-bold mt-2 mb-3"><i class="bi bi-translate text-primary mx-1 "></i>{{__('admin.ClientPosition')}} <span class="text-danger">*</span></div>
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-xl-9 fv-row">
                        <input type="text" class="form-control form-control-solid" name="position"  value="{{old('position')}}" placeholder="Manger" />
                             <div class="fv-plugins-message-container invalid-feedback">
                                 <x-input-error class="mt-2" :messages="$errors->get('position')" />
                            </div>
                    </div>
                </div>
                <!--end::Row-->


                     <!--begin::Row-->
                <div class="row mb-8">
                    <!--begin::Col-->
                    <div class="col-xl-3">
                        <div class="fs-6 fw-bold mt-2 mb-3"><i class="bi bi-translate text-primary mx-1 "></i>{{__('admin.ClientComment')}} <span class="text-danger">*</span></div>
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-xl-9 fv-row">
                        <textarea name="comment" class="form-control form-control-solid h-100px">{{old('comment')}}</textarea>
                            <div class="fv-plugins-message-container invalid-feedback">
                                 <x-input-error class="mt-2" :messages="$errors->get('comment')" />
                            </div>
                    </div>
                </div>
                <!--end::Row-->


                     <!--begin::Row-->
                <div class="row mb-8">
                    <!--begin::Col-->
                    <div class="col-xl-3">
                        <div class="fs-6 fw-bold mt-2 mb-3">{{__('admin.Link')}}</div>

                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-xl-9 fv-row">
                        <input type="text" class="form-control form-control-solid" name="link" value="{{old('link')}}"  placeholder="www.facebook.com/jone-doe" />
                              <div class="fv-plugins-message-container invalid-feedback">
                                 <x-input-error class="mt-2" :messages="$errors->get('link')" />
                            </div>
                    </div>
                </div>
                <!--end::Row-->

                     <!--begin::Row-->
                <div class="row mb-8">
                    <!--begin::Col-->
                    <div class="col-xl-3">
                        <div class="fs-6 fw-bold mt-2 mb-3">{{__('admin.Publish')}}</div>
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-xl-9 fv-row">
                        <div class="form-check form-switch form-check-custom form-check-solid me-10">
                            <input class="form-check-input h-30px w-50px"  checked type="checkbox" name="publish" id="flexSwitch30x50"/>
                        </div>
                    </div>
                </div>
                <!--end::Row-->


            </div>
            <!--end::Card body-->
            <!--begin::Card footer-->
            <div class="card-footer d-flex justify-content-end py-6 px-9">
                <button type="reset" class="btn btn-light btn-active-light-primary me-2">{{__('admin.Discard')}}</button>
                <button type="submit" class="btn btn-primary" id="kt_project_settings_submit">{{__('admin.SaveChanges')}}</button>
            </div>
            <!--end::Card footer-->
        </form>
        <!--end:Form-->
    </div>
@endsection

@section('script')

@endsection
