@extends('admin.layout.base')

@section('title' , __('admin.Users'))

@section('toolbar')

    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">

        <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
        <!--begin::Title-->
        <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">{{__('admin.Users')}}</h1>
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
            <li class="breadcrumb-item text-dark">{{__('admin.Users')}}</li>
            <!--end::Item-->
        </ul>
        <!--end::Breadcrumb-->
    </div>

    </div>
@endsection

@section('content')
<div class="card">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                    <span class="svg-icon svg-icon-1 position-absolute ms-6">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                            <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                    <input type="text" data-kt-user-table-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="{{__('admin.SearchInUsers')}}" />
                </div>
                <!--end::Search-->
            </div>
            <!--begin::Card title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                    <!--begin::Filter-->
                    <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                    <span class="svg-icon svg-icon-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z" fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->{{__('admin.Filter')}}</button>
                    <!--begin::Menu 1-->
                    <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
                        <!--begin::Header-->
                        <div class="px-7 py-5">
                            <div class="fs-5 text-dark fw-bolder">{{__('admin.FilterOptions')}}</div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Separator-->
                        <div class="separator border-gray-200"></div>
                        <!--end::Separator-->
                        <!--begin::Content-->
                        <div class="px-7 py-5" data-kt-user-table-filter="form">
                            <!--begin::Input group-->
                            <div class="mb-10">
                                <label class="form-label fs-6 fw-bold">{{__('admin.RoleName')}}:</label>
                                <select class="form-select form-select-solid fw-bolder" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-kt-user-table-filter="role" data-hide-search="true">
                                    <option value=""></option>
                                    @foreach($roles as $role)
                                    <option value="{{$role->name}}">{{$role->name}}</option>
                                        @endforeach
                                </select>
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="mb-10">
                                <label class="form-label fs-6 fw-bold">{{__('admin.Verified')}}:</label>
                                <select class="form-select form-select-solid fw-bolder" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-kt-user-table-filter="two-step" data-hide-search="true">
                                    <option></option>
                                    <option value="{{__('admin.Yes')}}">{{__('admin.Yes')}}</option>
                                      <option value="{{__('admin.No')}}">{{__('admin.No')}}</option>
                                </select>
                            </div>
                            <!--end::Input group-->
                            <!--begin::Actions-->
                            <div class="d-flex justify-content-end">
                                <button type="reset" class="btn btn-light btn-active-light-primary fw-bold me-2 px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="reset">{{__('admin.Reset')}}</button>
                                <button type="submit" class="btn btn-primary fw-bold px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="filter">{{__('admin.Apply')}}</button>
                            </div>
                            <!--end::Actions-->
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Menu 1-->
                    <!--end::Filter-->
                </div>
                <!--end::Toolbar-->
                <!--begin::Group actions-->
                @can('delete users')
                <div class="d-flex justify-content-end align-items-center d-none" data-kt-user-table-toolbar="selected">
                    <div class="fw-bolder me-5">
                    <span class="me-2" data-kt-user-table-select="selected_count"></span>{{__('admin.Selected')}}</div>
                    <button type="button" class="btn btn-danger" id="delete_selected">{{__('admin.DeleteSelected')}}</button>
                </div>
                @endcan
                <!--end::Group actions-->
            </div>
            <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-0">
            <form method="post" id="delete_all_users" action="{{route('admin.users.delete')}}">
                        @csrf

            <!--begin::Table-->
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                <!--begin::Table head-->
                <thead>
                    <!--begin::Table row-->
                    <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                        <th class="w-10px pe-2">
                            <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_table_users .form-check-input" value="1" />
                            </div>
                        </th>
                        <th class="min-w-125px">{{__('admin.User')}}</th>
                        <th class="min-w-125px">{{__('admin.RoleName')}}</th>
                        <th class="min-w-125px">{{__('admin.LastLogin')}}</th>
                        <th class="min-w-125px">{{__('admin.Verified')}}</th>
                        <th class="min-w-125px">{{__('admin.JoinedDate')}}</th>
                          @can('switch users type')
                        <th class="text-end min-w-100px"></th>
                        @endcan
                    </tr>
                    <!--end::Table row-->
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody class="text-gray-600 fw-bold">
                   @foreach($users as $user)
                      <tr>
                        <!--begin::Checkbox-->
                        <td>
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" name="usersIds[]" value="{{$user->id}}" />
                            </div>
                        </td>
                        <!--end::Checkbox-->
                        <!--begin::User=-->
                        <td class="d-flex align-items-center">
                            <!--begin:: Avatar -->
                            <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                    <div class="symbol-label fs-3  {{$user->type == 'admin' ? 'bg-light-primary text-primary' : 'bg-light-warning text-warning'}} ">      {{ strtoupper(substr($user->name, 0, 2)) }} </div>
                            </div>
                            <!--end::Avatar-->
                            <!--begin::User details-->
                            <div class="d-flex flex-column">
                                <a href="mailto:{{$user->email}}" class="text-gray-800 text-hover-primary mb-1">{{$user->name}}</a>
                                <span>{{$user->email}}</span>
                            </div>
                            <!--begin::User details-->
                        </td>
                        <!--end::User=-->
                        <!--begin::Role=-->
                        <td>
                              @if($user->roles->isNotEmpty())
                                {{$user->roles->first()->name}}
                            @else
                                {{__('admin.NoRoleAssigned')}}
                            @endif
                        </td>
                        <!--end::Role=-->
                        <!--begin::Last login=-->
                        <td>
                            <div class="badge badge-light fw-bolder">
                                @if($user->last_login)

                                    {{ \Carbon\Carbon::parse($user->last_login)->diffForHumans() }}
                                @else
                                    {{__('admin.NeverLoggedIn')}}
                                @endif

                            </div>
                        </td>
                        <!--end::Last login=-->
                        <!--begin::Two step=-->
                        <td>

                                @if($user->email_verified_at)
                                    <div class="badge badge-success fw-bolder">
                                    {{__('admin.Yes')}}
                                     </div>
                                @else
                                     <div class="badge badge-danger fw-bolder">
                                     {{__('admin.No')}}
                                     </div>
                                @endif



                        </td>
                        <!--end::Two step=-->
                        <!--begin::Joined-->
                        <td>{{$user->created_at}}</td>
                        <!--begin::Joined-->
                        <!--begin::Action=-->
                          @can('switch users type')
                        <td class="text-end">
                            @if($user->type == 'admin')
                            <a href="{{route('admin.users.switch' , [$user->id , 'user'])}}" class="btn btn-outline-warning btn-outline btn-sm">
                                {{__('admin.SwitchToUser')}}
                            </a>
                            @else
                                <a href="{{route('admin.users.switch' , [$user->id , 'admin'])}}" class="btn btn-outline-primary btn-outline btn-sm">
                                {{__('admin.SwitchToAdmin')}}
                            </a>
                            @endif

                        </td>
                        <!--end::Action=-->
                          @endcan
                    </tr>
                   @endforeach
                </tbody>
                <!--end::Table body-->
            </table>
            <!--end::Table-->
            </form>
        </div>
        <!--end::Card body-->
    </div>
@endsection

@section('js')
    <script src="/admin/plugins/custom/datatables/datatables.bundle.js"></script>
    <script src="/admin/js/custom/apps/user-management/users/list/table.js"></script>
    <script>
         $(document).on('click', '#delete_selected', function(e) {
        e.preventDefault();

    // Show the confirmation dialog
    Swal.fire({
        text: '{{__('admin.This action cannot be undone.')}}',
        icon: 'warning',
        showCancelButton: !0,
        buttonsStyling: !1,
        confirmButtonText: "{{__('admin.YesDelete!')}}",
        cancelButtonText: "{{__('admin.NoCancel')}}",
        customClass: {
            confirmButton: "btn fw-bold btn-danger",
            cancelButton: "btn fw-bold btn-active-light-primary"
        }
    }).then((result) => {
        if (result.isConfirmed) {
            $('#delete_all_users').submit();
        }
    });
});
    </script>
@endsection
