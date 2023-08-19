@extends('admin.layout.base')

@section('title' , __('admin.EditPlan'))

@section('css')
    <link href="{{ asset('admin/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css"/>

@endsection
@section('toolbar')

    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">

        <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
        <!--begin::Title-->
        <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">{{__('admin.EditPlan')}}</h1>
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
            <li class="breadcrumb-item text-dark">{{__('admin.EditPlan')}}</li>
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
            <div class="card-title fs-3 fw-bolder">{{__('admin.EditPlan')}}</div>
            <!--end::Card title-->
        </div>
        <form method="POST" action="{{route('admin.plans.update')}}" enctype="multipart/form-data">
            <div class="card-body">
                @csrf
                <input type="hidden" name="id" value="{{$plan->id}}">
                   <div class="row mb-8">
                    <!--begin::Col-->
                    <div class="col-xl-3">
                        <div class="fs-6 fw-bold mt-2 mb-5">{{__('admin.Image')}}</div>
                        <!--begin::Image input-->
                    </div>
                    <!--end::Col-->
                       <div class="col-xl-9 fv-row">
                                                  <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('/public/admin/media/avatars/blank.png')">
                            <!--begin::Preview existing avatar-->
                            <div class="image-input-wrapper w-125px h-125px bgi-position-center" style="background-size: 75%; background-image: url('{{asset('storage/' . $plan->img)}}')"></div>
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
                        <div class="form-text"> 125px * 125px </div>
                        <!--end::Hint-->
                       </div>
                       </div>

                <div class="row mb-8">
                                <!--begin::Col-->
                                <div class="col-xl-3">
                                    <div class="fs-6 fw-bold mt-2 mb-3"><i class="bi bi-translate text-primary mx-1 "></i>{{__('admin.Name')}}<span class="text-danger">*</span></div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-9 fv-row">
                                    <input type="text" class="form-control form-control-solid" name="name" value="{{old('name' , $plan->name)}}"  />
                                    <div class="fv-plugins-message-container invalid-feedback">
                                     <x-input-error class="mt-2" :messages="$errors->get('name')" />
                                </div>
                                </div>
                </div>

                     <div class="row mb-8">
                                <!--begin::Col-->
                                <div class="col-xl-3">
                                    <div class="fs-6 fw-bold mt-2 mb-3">{{__('admin.Price')}}<span class="text-danger">*</span></div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-9 fv-row ">
                                    <div class="input-group">
                                              <span class="input-group-text" id="basic-addon1">$</span>
                                    <input type="text" class="form-control form-control-solid" name="price" value="{{old('price' ,  intval($plan->price))}}"  />
                                    </div>

                                    <div class="fv-plugins-message-container invalid-feedback">
                                     <x-input-error class="mt-2" :messages="$errors->get('price')" />
                                </div>
                                </div>
                     </div>

                         <div class="row mb-8">
                                <!--begin::Col-->
                                <div class="col-xl-3">
                                    <div class="fs-6 fw-bold mt-2 mb-3">{{__('admin.Duration')}}<span class="text-danger">*</span></div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-9 fv-row">
                                           <select class="form-select" data-control="select2" name="duration" data-placeholder="Select an option">
                                                <option></option>
                                                <option {{old('duration'  ,  $plan->duration) == 'Monthly' ? 'selected' : '' }} value="Monthly">Monthly</option>
                                                <option {{old('duration'  ,  $plan->duration) == 'Yearly' ? 'selected' : '' }} value="Yearly">Yearly</option>
                                            </select>

                                    <div class="fv-plugins-message-container invalid-feedback">
                                     <x-input-error class="mt-2" :messages="$errors->get('duration')" />
                                </div>
                     </div>

                         </div>
                @foreach($plan->features()->orderBy('included' , 'DESC')->get() as $feature)
                      <div id="repeaterContainer">
                            <div class="row mb-8 feature-container">
                                <div class="col-xl-3">
                                    <div class="fs-6 fw-bold mt-2 mb-3">{{__('admin.FeatureName')}}<span class="text-danger">*</span></div>
                                </div>
                                <div class="col-xl-6 fv-row">
                                    <input type="text" class="form-control form-control-solid feature" value="{{$feature->name}}" name="feature[]">
                                    <input type="hidden" name="featureId[]" value="{{$feature->id}}">
                                </div>
                                <div class="col-xl-2">
                                    <label class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input"  {{$feature->included === 1 ? 'checked' : ''}}  name="included[]" type="checkbox"/>
                                        <span class="form-check-label">
                                            {{__('admin.Include')}}
                                        </span>
                                    </label>
                                </div>
                                <div class="col-xl-1">
                                             <a href="{{route('admin.plans.delete_feature' , $feature->id)}}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm delete-feature">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                                <span class="svg-icon svg-icon-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black" />
                                        <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black" />
                                        <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </a>
                                </div>
                            </div>
                        </div>
                 @endforeach
                         <div class="row mb-8">
                             <div class="col-xl-3">
                                  <button id="addFeatureBtn" class="btn btn-success"  type="button">
                                      <span class="svg-icon svg-icon-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
                                            <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
                                        </svg>
                                    </span>{{__('admin.AddNewFeature')}}</button>
                             </div>

                                  <div class="col-xl-3">
                                           <div class="fv-plugins-message-container invalid-feedback">
                                                 <x-input-error class="mt-2" :messages="$errors->get('feature')" />
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

    <script>
   $(document).ready(function() {
        var featureContainer = $('.feature-container').first().clone();

        $('#addFeatureBtn').on('click', function() {
            var clonedContainer = featureContainer.clone();
            clonedContainer.find('input').val('');
            clonedContainer.find('input[type="checkbox"]').prop('checked', true).removeAttr('value');
            clonedContainer.find('.delete-feature').removeAttr('href').addClass('delete-feature-btn');
            $('#repeaterContainer').append(clonedContainer);


        });

        $(document).on('click', '.delete-feature-btn', function() {
            $(this).closest('.feature-container').remove();
        });
        });

    </script>
@endsection
