@extends('admin.layout.base')

@section('title' , __('admin.ViewRoleDetails'))

@section('toolbar')

    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">

        <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <!--begin::Title-->
            <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">{{__('admin.RolesList')}}</h1>
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
                <li class="breadcrumb-item text-dark">{{__('admin.ViewRoleDetails')}}</li>
                <!--end::Item-->
            </ul>
            <!--end::Breadcrumb-->


        </div>

    </div>
@endsection

@section('content')
    	<div class="d-flex flex-column flex-xl-row">
        <!--begin::Sidebar-->
        <div class="flex-column flex-lg-row-auto w-100 w-lg-300px mb-10">
            <!--begin::Card-->
            <div class="card card-flush">
                <!--begin::Card header-->
                <div class="card-header">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <h2 class="mb-0">{{$role->name}}</h2>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Permissions-->
                    <div class="d-flex flex-column text-gray-600">
                        @foreach($role->permissions as $permission)
                        <div class="d-flex align-items-center py-2">
                        <span class="bullet bg-primary me-3"></span>{{$permission->name}}
                        </div>
                            @endforeach
                    </div>
                    <!--end::Permissions-->
                </div>
                <!--end::Card body-->
                @can('edit roles')
                <!--begin::Card footer-->
                <div class="card-footer pt-0">
                    <button type="button" class="btn btn-light btn-active-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_update_role">{{__('admin.EditRole')}}</button>
                </div>
                <!--end::Card footer-->
                @endcan
            </div>
            <!--end::Card-->
            <!--begin::Modal-->
            <!--begin::Modal - Update role-->
            <div class="modal fade" id="kt_modal_update_role" tabindex="-1" aria-hidden="true">
                <!--begin::Modal dialog-->
                <div class="modal-dialog modal-dialog-centered mw-750px">
                    <!--begin::Modal content-->
                    <div class="modal-content">
                        <!--begin::Modal header-->
                        <div class="modal-header">
                            <!--begin::Modal title-->
                            <h2 class="fw-bolder">{{__('admin.UpdateRole')}}</h2>
                            <!--end::Modal title-->
                            <!--begin::Close-->
                            <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-roles-modal-action="close">
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                <span class="svg-icon svg-icon-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                        <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </div>
                            <!--end::Close-->
                        </div>
                        <!--end::Modal header-->
                        <!--begin::Modal body-->
                        <div class="modal-body scroll-y mx-5 my-7">
                            <!--begin::Form-->
                            <form id="kt_modal_update_role_form" class="form" method="post" action="{{route('admin.roles.update')}}">
                                @csrf
                                <input type="hidden" name="id" value="{{$role->id}}">
                                <!--begin::Scroll-->
                                <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_update_role_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_update_role_header" data-kt-scroll-wrappers="#kt_modal_update_role_scroll" data-kt-scroll-offset="300px">
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-10">
                                        <!--begin::Label-->
                                        <label class="fs-5 fw-bolder form-label mb-2">
                                            <span class="required">{{__('admin.RoleName')}}</span>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input class="form-control form-control-solid" name="role_name" value="{{old('role_name' , $role->name)}}" />
                                                  <div class="fv-plugins-message-container invalid-feedback">
                                                         <x-input-error class="mt-2" :messages="$errors->get('role_name')" />
                                                    </div>
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Permissions-->
                                    <div class="fv-row">
                                        <!--begin::Label-->
                                        <label class="fs-5 fw-bolder form-label mb-2">{{__('admin.RolePermissions')}}</label>
                                        <!--end::Label-->
                                        <!--begin::Table wrapper-->
                                        <div class="table-responsive">
                                            <!--begin::Table-->
                                            <table class="table align-middle table-row-dashed fs-6 gy-5">
                                                <!--begin::Table body-->
                                                <tbody class="text-gray-600 fw-bold">
                                                    <!--begin::Table row-->
                                                    <tr>
                                                        <td class="text-gray-800">{{__('admin.AdministratorAccess')}}
                                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Allows a full access to the system"></i></td>
                                                        <td>
                                                            <!--begin::Checkbox-->
                                                            <label class="form-check form-check-sm form-check-custom form-check-solid me-9">
                                                                <input class="form-check-input" type="checkbox" value="" id="kt_roles_select_all" />
                                                                <span class="form-check-label" for="kt_roles_select_all">{{__('admin.SelectAll')}}</span>
                                                            </label>
                                                            <!--end::Checkbox-->
                                                        </td>
                                                    </tr>
                                                   @foreach($permissions as $permission)
                                                        <tr>
                                                            <!--begin::Label-->
                                                            <td class="text-gray-800">{{$permission->name}}</td>
                                                            <!--end::Label-->
                                                            <!--begin::Options-->
                                                            <td>
                                                                <!--begin::Wrapper-->
                                                                <div class="d-flex">
                                                                    <!--begin::Checkbox-->
                                                                    <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                                        <input class="form-check-input" type="checkbox" name="permissions[]" @if(in_array($permission->id, $role->permissions->pluck('id')->toArray() )) checked @endif
                                                                               value="{{ $permission->id }}" />
                                                                    </label>
                                                                    <!--end::Checkbox-->
                                                                </div>
                                                                <!--end::Wrapper-->
                                                            </td>
                                                            <!--end::Options-->
                                                        </tr>
                                                            @endforeach
                                                </tbody>
                                                <!--end::Table body-->
                                            </table>
                                            <!--end::Table-->
                                        </div>
                                        <!--end::Table wrapper-->
                                    </div>
                                    <!--end::Permissions-->
                                </div>
                                <!--end::Scroll-->
                                <!--begin::Actions-->
                                <div class="text-center pt-15">
                                    <button type="reset" class="btn btn-light me-3" data-kt-roles-modal-action="cancel">{{__('admin.Discard')}}</button>
                                    <button type="submit" class="btn btn-primary" data-kt-roles-modal-action="submit">
                                        <span class="indicator-label">{{__('admin.Submit')}}</span>
                                        <span class="indicator-progress">{{__('admin.PleaseWait')}}
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </button>
                                </div>
                                <!--end::Actions-->
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Modal body-->
                    </div>
                    <!--end::Modal content-->
                </div>
                <!--end::Modal dialog-->
            </div>
            <!--end::Modal - Update role-->
            <!--end::Modal-->
        </div>
        <!--end::Sidebar-->
             @can('assign users to role')
        <!--begin::Content-->
        <div class="flex-lg-row-fluid ms-lg-10">
            <!--begin::Card-->
            <div class="card card-flush mb-6 mb-xl-9">
                <!--begin::Card header-->
                <div class="card-header pt-5">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <h2 class="d-flex align-items-center">{{__('admin.UsersAssigned')}}
                        <span class="text-gray-600 fs-6 ms-1">({{$role->users()->count()}})</span></h2>
                    </div>
                    <!--end::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Search-->
                        <div class="d-flex align-items-center position-relative my-1" data-kt-view-roles-table-toolbar="base">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                            <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                                    <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <input type="text" data-kt-roles-table-filter="search" class="form-control form-control-solid w-250px ps-15" placeholder="Search Users" />
                        </div>
                        <!--end::Search-->
                        <!--begin::Group actions-->
                        <div class="d-flex justify-content-end align-items-center d-none" data-kt-view-roles-table-toolbar="selected">
                            <div class="fw-bolder me-5">
                            <span class="me-2" data-kt-view-roles-table-select="selected_count"></span>{{__('admin.Selected')}}</div>
                            <button type="button" class="btn btn-danger" id="delete_selected">{{__('admin.DeleteSelected')}}</button>
                        </div>
                        <!--end::Group actions-->
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <form method="post" id="delete_all_users" action="{{route('admin.roles.remove_users_from_role')}}">
                        @csrf
                        <input type="hidden" name="role_id" value="{{$role->id}}">
                    <!--begin::Table-->
                    <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0" id="kt_roles_view_table">
                        <!--begin::Table head-->
                        <thead>
                            <!--begin::Table row-->
                            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                <th class="w-10px pe-2">
                                    <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                        <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_roles_view_table .form-check-input" value="1" />
                                    </div>
                                </th>
                                <th class="min-w-50px">#</th>
                                <th class="min-w-150px">{{__('admin.User')}}</th>
                                <th class="min-w-125px">{{__('admin.JoinedDate')}}</th>
                                <th class="text-end min-w-100px"></th>
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody class="fw-bold text-gray-600">

                         @foreach($role->users as $key => $user)
                                <tr>
                                <!--begin::Checkbox-->
                                <td>
                                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" name="usersIds[]" value="{{$user->id}}" />
                                    </div>
                                </td>
                                <!--end::Checkbox-->
                                <!--begin::ID-->
                                <td>{{$key + 1}}</td>
                                <!--begin::ID-->
                                <!--begin::User=-->
                                <td class="d-flex align-items-center">
                                    <!--begin:: Avatar -->
                                    <!--end::Avatar-->
                                    <!--begin::User details-->
                                    <div class="d-flex flex-column">
                                        <a href="../../demo1/dist/apps/user-management/users/view.html" class="text-gray-800 text-hover-primary mb-1">{{$user->name}}</a>
                                        <span>{{$user->email}}</span>
                                    </div>
                                    <!--begin::User details-->
                                </td>
                                <!--end::user=-->
                                <!--begin::Joined date=-->
                                <td>{{$user->created_at}}</td>
                                <!--end::Joined date=-->
                                <!--begin::Action=-->
                                <td class="text-end">
                                    <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                    <span class="svg-icon svg-icon-5 m-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon--></a>
                                    <!--begin::Menu-->
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="../../demo1/dist/apps/user-management/users/view.html" class="menu-link px-3">{{__('admin.View')}}</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="" class="menu-link px-3 delete-user" data-id="{{$user->id}}" data-name="{{$user->name}}" >{{__('admin.Delete')}}</a>
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu-->
                                </td>
                                <!--end::Action=-->
                            </tr>
                         @endforeach

                        </tbody>
                        <!--end::Table body-->
                    </table>
                    </form>
                    <!--end::Table-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->

            <!--begin::Card-->
            <div class="card card-flush mb-6 mb-xl-9">
                <!--begin::Card header-->
                <div class="card-header pt-5">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <h3 class="d-flex align-items-center">{{__('admin.AssignNewUser')}}</h3>
                    </div>
                    <!--end::Card title-->

                </div>
                <!--end::Card header-->
                <form method="post" action="{{route('admin.roles.assign_users')}}">
                    @csrf

                    <input type="hidden" value="{{$role->id}}" name="role_id">
                <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <select class="form-select form-select-solid" data-control="select2" name="user_ids[]" data-placeholder="Select an option" data-allow-clear="true" multiple="multiple">
                                <option>{{__('admin.PleaseChoseOne')}}</option>
                                @foreach($users as $user)
                                      <option value="{{$user->id}}">{{$user->name}}</option >
                                @endforeach
                            </select>

                        </div>
                <!--end::Card body-->
                      <div class="card-footer d-flex justify-content-end py-6 px-9">
                        <button class="btn btn-light btn-active-light-primary me-2">{{__('admin.Discard')}}</button>
                        <button class="btn btn-primary px-6" type="submit">{{__('admin.SaveChanges')}}</button>
                    </div>
                </form>
            </div>
            <!--end::Card-->

        </div>
        <!--end::Content-->
            @endcan
    </div>
@endsection

@section('js')
    			<!--begin::Page Vendors Javascript(used by this page)-->
		<script src="/admin/plugins/custom/datatables/datatables.bundle.js"></script>
		<!--end::Page Vendors Javascript-->
		<!--begin::Page Custom Javascript(used by this page)-->
		<script src="/admin/js/custom/apps/user-management/roles/view/view.js"></script>
		<script src="/admin/js/custom/apps/user-management/roles/view/update-role.js"></script>

    <script>
        $(document).on('click', '.delete-user', function(e) {
        e.preventDefault();
        let userId = $(this).data('id');
        let userName = $(this).data('name');
        let csrfToken = $('meta[name="csrf-token"]').attr('content');
        let tr = $(this).closest("tr");
        let selectElement = $('select[name="user_ids[]"]');

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

            $.ajax({
                url: '{{route('admin.roles.remove_user_from_role')}}' ,
                type: 'POST',
                data : {
                    'user_id' : userId ,
                    'role_id' : '{{$role->id}}' ,
                    '_token' : csrfToken ,
                },
                success: function(response) {
                    // Handle the success response
                    Swal.fire({
                        text: "{{__('admin.TheOpreationDoneSuccessFully')}}",
                    icon: "success",
                    buttonsStyling: !1,
                    confirmButtonText: "{{__('admin.OkGoIt')}}",
                    customClass: {
                        confirmButton: "btn fw-bold btn-primary"
                    }

                    });
                    tr.remove();
                    selectElement.append('<option value="' + userId + '">' + userName + '</option>');

                },
                error: function(xhr, status, error) {
                    // Handle the error response
                    Swal.fire({
                        title: '{{__('admin.Error!')}}',
                        text: '{{__('admin.AnErrorOccurred')}}',
                        icon: 'error',
                        showConfirmButton: false,
                        timer: 2000
                    });
                }
            });
        }
    });
});
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
