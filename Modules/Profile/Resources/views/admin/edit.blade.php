@extends('admin.layout.base')

@section('title' , __('admin.AccountSettings'))

@section('toolbar')

    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">

        <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
        <!--begin::Title-->
        <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">{{__('admin.AccountSettings')}}</h1>
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
            <li class="breadcrumb-item text-dark">{{__('admin.AccountSettings')}}</li>
            <!--end::Item-->
        </ul>
        <!--end::Breadcrumb-->
    </div>

    </div>
@endsection

@section('content')

    <div class="card mb-5 mb-xl-10">
        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
										<!--begin::Card title-->
            <div class="card-title m-0">
                <h3 class="fw-bolder m-0">  {{__('admin.ProfileInformation')}}</h3>
            </div>
            <!--end::Card title-->
        </div>

         <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                @csrf
            </form>

            <form method="post" action="{{ route('admin.profile.update') }}" class="mt-6 space-y-6">
                @csrf
                @method('patch')

        <div class="card-body pt-9 pb-0">
                <div class="row mb-6">
                                                            <!--begin::Label-->
                    <label class="col-lg-4 col-form-label required fw-bold fs-6">  {{__('admin.Name')}}</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8">
                        <!--begin::Row-->
                        <div class="row">
                            <!--begin::Col-->
                            <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                <input type="text" name="name" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" value="{{old('name', $user->name)}}" required autofocus autocomplete="name">
                            <div class="fv-plugins-message-container invalid-feedback">
                                 <x-input-error class="mt-2" :messages="$errors->get('name')" />
                            </div></div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Col-->
                </div>

                <div class="row mb-6">
                                                            <!--begin::Label-->
                    <label class="col-lg-4 col-form-label required fw-bold fs-6">  {{__('admin.Email')}}</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8">
                        <!--begin::Row-->
                        <div class="row">
                            <!--begin::Col-->
                            <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                <input type="text" name="email" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" value="{{old('email', $user->email)}}"  autocomplete="email">
                            <div class="fv-plugins-message-container invalid-feedback">
                                 <x-input-error class="mt-2" :messages="$errors->get('email')" />
                            </div>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                         @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                        <div>
                            <p class="text-sm mt-2 text-gray-800">
                                {{ __('Your email address is unverified.') }}

                                <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    {{ __('Click here to re-send the verification email.') }}
                                </button>
                            </p>

                            @if (session('status') === 'verification-link-sent')
                                <p class="mt-2 font-medium text-sm text-green-600">
                                    {{ __('A new verification link has been sent to your email address.') }}
                                </p>
                            @endif
                        </div>
                    @endif
                    </div>
                    <!--end::Col-->
                </div>
        </div>

        <div class="card-footer d-flex justify-content-end py-6 px-9">
            <button class="btn btn-light btn-active-light-primary me-2">{{__('admin.Discard')}}</button>
            <button class="btn btn-primary px-6" type="submit">{{__('admin.SaveChanges')}}</button>
        </div>
            </form>
    </div>

   <!--begin::Deactivate Account-->
    <div class="card mb-5 mb-xl-10">
        <!--begin::Card header-->
        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_update_password" aria-expanded="true" aria-controls="kt_update_password">
            <div class="card-title m-0">
                <h3 class="fw-bolder m-0">{{__('admin.UpdatePassword')}}</h3>
            </div>
        </div>
        <!--end::Card header-->
            <!--begin::Content-->
            <div id="kt_update_password" class="collapse">
                <!--begin::Form-->
                <form  class="form"  method="post" action="{{ route('password.update') }}">
                    @csrf
                    @method('put')
                     <div class="card-body pt-9 pb-0">
                    <div class="row mb-6">
                                                                <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">  {{__('admin.CurrentPassword')}}</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <!--begin::Row-->
                            <div class="row">
                                <!--begin::Col-->
                                <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                    <input type="password" name="current_password" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" value="{{old('current_password')}}" required  autocomplete="current-password">
                                <div class="fv-plugins-message-container invalid-feedback">
                                       <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                                </div>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->
                        </div>
                        <!--end::Col-->
                    </div>

                    <div class="row mb-6">
                                                                <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">  {{__('admin.NewPassword')}}</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <!--begin::Row-->
                            <div class="row">
                                <!--begin::Col-->
                                <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                    <input type="password" name="password" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"    autocomplete="new-password">
                                <div class="fv-plugins-message-container invalid-feedback">
                                                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                                </div>
                                </div>
                                <!--end::Col-->
                            </div>
                        </div>
                        <!--end::Col-->
                    </div>

                         <div class="row mb-6">
                                                                <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">  {{__('admin.ConfirmPassword')}}</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <!--begin::Row-->
                            <div class="row">
                                <!--begin::Col-->
                                <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                    <input type="password" name="password_confirmation" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"    autocomplete="new-password">
                                <div class="fv-plugins-message-container invalid-feedback">
                                                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                                </div>
                                </div>
                                <!--end::Col-->
                            </div>
                        </div>
                        <!--end::Col-->
                    </div>

            </div>

            <div class="card-footer d-flex justify-content-end py-6 px-9">
                <button class="btn btn-light btn-active-light-primary me-2">{{__('admin.Discard')}}</button>
                <button class="btn btn-primary px-6" type="submit">{{__('admin.SaveChanges')}}</button>
            </div>

            </form>
            <!--end::Form-->
        </div>
        <!--end::Content-->
    </div>

    <!--begin::Deactivate Account-->
    <div class="card">
        <!--begin::Card header-->
        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_deactivate" aria-expanded="true" aria-controls="kt_account_deactivate">
            <div class="card-title m-0">
                <h3 class="fw-bolder m-0">{{__('admin.DeactivateAccount')}}</h3>
            </div>
        </div>
        <!--end::Card header-->
        <!--begin::Content-->
        <div id="kt_account_deactivate" class="collapse">
            <!--begin::Form-->
            <form id="kt_account_deactivate_form" class="form"  method="post" action="{{ route('admin.profile.destroy') }}">
            @csrf
            @method('delete')
                <!--begin::Card body-->
                <div class="card-body border-top p-9">
                    <!--begin::Notice-->
                    <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed mb-9 p-6">
                        <!--begin::Icon-->
                        <!--begin::Svg Icon | path: icons/duotune/general/gen044.svg-->
                        <span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black" />
                                <rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)" fill="black" />
                                <rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)" fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                        <!--end::Icon-->
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-stack flex-grow-1">
                            <!--begin::Content-->
                            <div class="fw-bold">
                                <h4 class="text-gray-900 fw-bolder">{{__('admin.YouAreDeactivatingYourAccount')}}</h4>
                                <div class="fs-6 text-gray-700">
                                    {{__('admin.ForExtraSecurity')}}

                                </div>
                            </div>
                            <!--end::Content-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Notice-->
                    <div class="row">
                           <div class="col-lg-12 mb-5 fv-row fv-plugins-icon-container">
                                <input type="password" name="password" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" required placeholder="{{__('admin.Password')}}">
                            <div class="fv-plugins-message-container invalid-feedback">
                                 <x-input-error class="mt-2" :messages="$errors->userDeletion->get('password')" />
                            </div></div>
                    </div>


                    <!--begin::Form input row-->
                    <div class="form-check form-check-solid fv-row">
                        <input name="deactivate" class="form-check-input" required type="checkbox" value="" id="deactivate" />
                        <label class="form-check-label fw-bold ps-2 fs-6" for="deactivate">{{__('admin.IConfirmMyAccountDeactivation')}}</label>
                    </div>
                    <!--end::Form input row-->
                </div>
                <!--end::Card body-->
                <!--begin::Card footer-->
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <button id="kt_account_deactivate_account_submit" type="submit" class="btn btn-danger fw-bold">{{__('admin.DeactivateAccount')}}</button>
                </div>
                <!--end::Card footer-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::Content-->
    </div>

@endsection


