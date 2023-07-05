@extends('admin.layout.base')

@section('title' , __('admin.Dashboard'))



@section('toolbar')

    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">

        <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
        <!--begin::Title-->
        <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">{{__('admin.Dashboard')}}</h1>
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
        </ul>
        <!--end::Breadcrumb-->
    </div>

    </div>
@endsection

@section('content')

    <!--begin::Alert-->
<div class="alert alert-dismissible bg-light-primary border border-primary d-flex flex-column flex-sm-row p-3 mb-10">
    <!--begin::Icon-->
    <!--end::Icon-->

    <!--begin::Wrapper-->

        <!--begin::Title-->
        <h3 class="fw-bold p-3"> <span class="mx-1" style='font-size:20px;'>&#128075;</span> {{__('admin.WelcomeBack' , ['name' => auth()->user()->name])}}</h3>
        <!--end::Title-->
        <!--begin::Content-->

        <!--end::Content-->

    <!--end::Wrapper-->

    <!--begin::Close-->
    <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
                <i class="bi bi-x-lg"></i>
    </button>
    <!--end::Close-->
</div>
<!--end::Alert-->

      <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-5 g-xl-9">
          <div class="col-md-3">
              <div class="card h-md-100">
                <!--begin::Card body-->
                <div class="card-body d-flex flex-center">
                    <!--begin::Button-->
                    <a href="{{route('admin.users.index')}}" class="btn btn-clear d-flex flex-column flex-center" >
                        <i class="bi bi-people text-primary mb-7" style="font-size: 75px"></i>
                        <span class="fw-bolder fs-1 text-gray-700 text-hover-primary">{{__('admin.Admins')}} <span class="text-success">({{$admins_count}})</span> </span>
                        <!--end::Label-->
                    </a>
                    <!--begin::Button-->
                </div>
                <!--begin::Card body-->
            </div>
          </div>
           <div class="col-md-3">
          <div class="card h-md-100">
                <!--begin::Card body-->
                <div class="card-body d-flex flex-center">
                    <!--begin::Button-->
                    <a href="{{route('admin.users.index')}}" class="btn btn-clear d-flex flex-column flex-center" >
                        <i class="bi bi-people text-primary mb-7" style="font-size: 75px"></i>
                        <span class="fw-bolder fs-1 text-gray-700 text-hover-primary">{{__('admin.Users')}} <span class="text-success">({{$users_count}})</span></span>
                        <!--end::Label-->
                    </a>
                    <!--begin::Button-->
                </div>
                <!--begin::Card body-->
            </div>
           </div>

           <div class="col-md-3">
               <div class="card h-md-100">
                <!--begin::Card body-->
                <div class="card-body d-flex flex-center">
                    <!--begin::Button-->
                    <a href="{{route('admin.subscribers.index')}}" class="btn btn-clear d-flex flex-column flex-center" >
                        <i class="bi bi-envelope-open-heart text-primary mb-7" style="font-size: 75px"></i>
                        <span class="fw-bolder fs-1 text-gray-700 text-hover-primary">{{__('admin.Subscribers')}} <span class="text-success">({{$subscripers_count}})</span></span>
                        <!--end::Label-->
                    </a>
                    <!--begin::Button-->
                </div>
                <!--begin::Card body-->
            </div>
           </div>

             <div class="col-md-3">
               <div class="card h-md-100">
                <!--begin::Card body-->
                <div class="card-body d-flex flex-center">
                    <!--begin::Button-->
                    <a href="{{route('admin.blogs.index')}}" class="btn btn-clear d-flex flex-column flex-center" >
                        <i class="bi bi-window-stack text-primary mb-7" style="font-size: 75px"></i>
                        <span class="fw-bolder fs-1 text-gray-700 text-hover-primary">{{__('admin.Blogs')}} <span class="text-success">({{$blogs_count}})</span></span>
                        <!--end::Label-->
                    </a>
                    <!--begin::Button-->
                </div>
                <!--begin::Card body-->
            </div>
           </div>

                <div class="col-md-3">
               <div class="card h-md-100">
                <!--begin::Card body-->
                <div class="card-body d-flex flex-center">
                    <!--begin::Button-->
                    <a href="{{route('admin.plans.index')}}" class="btn btn-clear d-flex flex-column flex-center" >
                        <i class="bi bi-file-earmark-ppt  text-primary mb-7" style="font-size: 75px"></i>

                        <span class="fw-bolder fs-1 text-gray-700 text-hover-primary">{{__('admin.Plans')}} <span class="text-success">({{$plans_count}})</span></span>
                        <!--end::Label-->
                    </a>
                    <!--begin::Button-->
                </div>
                <!--begin::Card body-->
            </div>
           </div>

            <div class="col-md-3">
               <div class="card h-md-100">
                <!--begin::Card body-->
                <div class="card-body d-flex flex-center">
                    <!--begin::Button-->
                    <a href="{{route('admin.contacts.index')}}" class="btn btn-clear d-flex flex-column flex-center" >
                        <i class="bi bi-mailbox text-primary mb-7" style="font-size: 75px"></i>
                        <span class="fw-bolder fs-1 text-gray-700 text-hover-primary">{{__('admin.Contacts')}} <span class="text-success">({{$contact_count}})</span></span>
                        <!--end::Label-->
                    </a>
                    <!--begin::Button-->
                </div>
                <!--begin::Card body-->
            </div>
           </div>

      </div>
@endsection
