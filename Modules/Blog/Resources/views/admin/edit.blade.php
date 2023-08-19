@extends('admin.layout.base')

@section('title' , __('admin.EditBlog'))

@section('css')
   <link href="{{ asset('admin/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css"/>

@endsection
@section('toolbar')

    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">

        <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
        <!--begin::Title-->
        <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">{{__('admin.EditBlog')}}</h1>
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
            <li class="breadcrumb-item text-dark">{{__('admin.EditBlog')}}</li>
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
            <div class="card-title fs-3 fw-bolder">{{__('admin.EditBlog')}}</div>
            <!--end::Card title-->
        </div>
        <form method="POST" action="{{route('admin.blogs.update')}}" enctype="multipart/form-data">
            <input type="hidden" value="{{$blog->id}}" name="id">
            <div class="card-body">
                @csrf
                   <div class="row mb-8">
                    <!--begin::Col-->
                    <div class="col-xl-3">
                        <div class="fs-6 fw-bold mt-2 mb-5">{{__('admin.BlogImg')}}</div>
                        <!--begin::Image input-->
                    </div>
                    <!--end::Col-->
                       <div class="col-xl-9 fv-row">
                                                  <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('/public/admin/media/avatars/blank.png')">
                            <!--begin::Preview existing avatar-->
                            <div class="image-input-wrapper w-125px h-125px bgi-position-center" style="background-size: 75%; background-image: url({{asset('storage/' . $blog->img)}})"></div>
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
                        <div class="form-text"> 1200px * 600px </div>
                        <!--end::Hint-->
                       </div>
                       </div>

                <div class="row mb-8">
                    <div class="col-xl-3">
                        <div class="fs-6 fw-bold mt-2 mb-3">{{__('admin.Category')}} <span class="text-danger">*</span></div>
                    </div>
                      <div class="col-xl-9 fv-row">
                          <select class="form-select" data-control="select2"  name="category" data-placeholder="Select an option">

                              @foreach($categories as $cat)
                               <option {{old('category' , $blog->categorey_id) == $cat->id ? 'selected' : ''}} value="{{$cat->id}}">{{$cat->name}} </option>
                              @endforeach
                        </select>


                      </div>
                </div>


                <div class="row mb-8">
                                <!--begin::Col-->
                                <div class="col-xl-3">
                                    <div class="fs-6 fw-bold mt-2 mb-3"><i class="bi bi-translate text-primary mx-1 "></i>{{__('admin.BlogTitle')}}<span class="text-danger">*</span></div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-9 fv-row">
                                    <input type="text" class="form-control form-control-solid" name="title" value="{{old('title' , $blog->title)}}"  />
                                    <div class="fv-plugins-message-container invalid-feedback">
                                     <x-input-error class="mt-2" :messages="$errors->get('title')" />
                                </div>
                                </div>
                </div>

                     <div class="row mb-8">
                                <!--begin::Col-->
                                <div class="col-xl-3">
                                    <div class="fs-6 fw-bold mt-2 mb-3"><i class="bi bi-translate text-primary mx-1 "></i>{{__('admin.BlogIntro')}}<span class="text-danger">*</span></div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-9 fv-row">
                                    <input type="text" class="form-control form-control-solid" name="intro" value="{{old('intro' , $blog->intro)}}"  />
                                    <div class="fv-plugins-message-container invalid-feedback">
                                     <x-input-error class="mt-2" :messages="$errors->get('intro')" />
                                </div>
                                </div>
                     </div>

                         <div class="row mb-8">
                                <!--begin::Col-->
                                <div class="col-xl-3">
                                    <div class="fs-6 fw-bold mt-2 mb-3"><i class="bi bi-translate text-primary mx-1 "></i>{{__('admin.BlogKeywords')}}<span class="text-danger">*</span></div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-9 fv-row">
                                    <input type="text" class="form-control form-control-solid" name="keywords" value="{{old('keywords' , $blog->keywords)}}"  />
                                    <div class="fv-plugins-message-container invalid-feedback">
                                     <x-input-error class="mt-2" :messages="$errors->get('keywords')" />
                                </div>
                     </div>

                         </div>

                         <div class="row mb-8">
                                <!--begin::Col-->
                                <div class="col-xl-3">
                                    <div class="fs-6 fw-bold mt-2 mb-3"><i class="bi bi-translate text-primary mx-1 "></i>{{__('admin.Content')}}<span class="text-danger">*</span></div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-9 fv-row">
                                      <textarea name="content" class="form-control form-control-solid " id="tinymce">{!! old('content' , $blog->content) !!}</textarea>
                                    <div class="fv-plugins-message-container invalid-feedback">
                                     <x-input-error class="mt-2" :messages="$errors->get('Content')" />
                                </div>
                                </div>
                         </div>



                         <div class="row mb-8">
                                <!--begin::Col-->
                                <div class="col-xl-3">
                                    <div class="fs-6 fw-bold mt-2 mb-3">{{__('admin.Publish')}}</div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-9 fv-row">
                                         <div class="form-check form-switch form-check-custom form-check-solid me-10">
                                                <input class="form-check-input h-30px w-50px"  {{$blog->publish == 1 ? 'checked' : ''}}  type="checkbox" name="publish" id="flexSwitch30x50"/>
                                            </div>
                                    <div class="fv-plugins-message-container invalid-feedback">
                                     <x-input-error class="mt-2" :messages="$errors->get('Content')" />
                                </div>
                                </div>
                         </div>

                         <div class="row mb-8">
                                <!--begin::Col-->
                                <div class="col-xl-3">
                                    <div class="fs-6 fw-bold mt-2 mb-3">{{__('admin.Featured')}}</div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-9 fv-row">
                                         <div class="form-check form-switch form-check-custom form-check-solid me-10">
                                                <input class="form-check-input h-30px w-50px"   {{$blog->featured == 1 ? 'checked' : ''}} type="checkbox" name="featured" id="flexSwitch30x50"/>
                                            </div>
                                    <div class="fv-plugins-message-container invalid-feedback">
                                     <x-input-error class="mt-2" :messages="$errors->get('featured')" />
                                </div>
                                </div>
                         </div>

                     <div class="row mb-8">
                                <!--begin::Col-->
                                <div class="col-xl-3">
                                    <div class="fs-6 fw-bold mt-2 mb-3">{{__('admin.Service')}}</div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-9 fv-row">
                                         <div class="form-check form-switch form-check-custom form-check-solid me-10">
                                                <input class="form-check-input h-30px w-50px"  {{$blog->service == 1 ? 'checked' : ''}}  type="checkbox" name="service" id="flexSwitch30x50"/>
                                            </div>
                                    <div class="fv-plugins-message-container invalid-feedback">
                                     <x-input-error class="mt-2" :messages="$errors->get('service')" />
                                </div>
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

@section('js')
   <script src="{{ asset('admin/plugins/global/plugins.bundle.js') }}"></script>

    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tinymce/tinymce-jquery@1/dist/tinymce-jquery.min.js"></script>

    <script>
        $('textarea#tinymce').tinymce({
               height: 600, /* other settings... */
               relative_urls: true,
               browser_spellcheck: true ,
               plugins: 'link autolink , image , insertdatetime , table',
               link_default_target: '_blank' ,
              @if(app()->getLocale() == 'ar') language: 'ar' , @endif
               images_file_types: 'jpg,svg,png,webp'

        });
    </script>
@endsection
