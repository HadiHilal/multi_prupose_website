@extends('admin.layout.base')

@section('title' , __('admin.Contacts'))

@section('toolbar')

    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">

        <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
        <!--begin::Title-->
        <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">{{__('admin.Contacts')}}</h1>
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
            <li class="breadcrumb-item text-dark">{{__('admin.Contacts')}}</li>
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
                     <span class="card-label fw-bolder fs-3 mb-1">{{__('admin.Contacts')}}</span>
                </div>
                <!--end::Search-->
            </div>
            <!--begin::Card title-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-0">
            <!--begin::Table-->
            <table class="table align-middle table-row-dashed fs-7 gy-3" id="kt_contacts_table">
                <!--begin::Table head-->
                <thead>
                    <!--begin::Table row-->
                    <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                        <th></th>
                        <th>{{__('admin.Name')}}</th>
                        <th>{{__('admin.Email')}}</th>
                        <th>{{__('admin.Phone')}}</th>
                        <th>{{__('admin.Country')}}</th>
                        <th>{{__('admin.Subject')}}</th>
                          <th>{{__('admin.Message')}}</th>
                        <th>{{__('admin.CreatedDate')}}</th>
                        @can('delete contacts')
                        <th class="text-end "></th>
                        @endcan
                    </tr>
                    <!--end::Table row-->
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody class="text-gray-600 fw-bold">
                @foreach($contacts as $key => $item)
                    <tr>
                        <td>
                            {{$key + 1}}
                        </td>
                        <!--begin::Customer=-->
                        <td>
                            {{$item->name}}
                        </td>

                        <td>
                           <a href="mailto:{{$item->email}}" target="_blank">
                               {{$item->email}}
                           </a>
                        </td>
                        <td>
                                 <a href="tel:{{$item->phone}}" target="_blank">
                               {{$item->phone}}
                             </a>
                        </td>

                        <td>
                            {{ $item->country }}
                        </td>
                        <td>
                            {{$item->subject}}
                        </td>

                        <td>
                            <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_{{$key}}">
                                {{__('admin.Show')}}
                            </button>
                            <div class="modal fade" tabindex="-1" id="kt_modal_{{$key}}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h6 class="modal-title">{{__('admin.Message')}}</h6>

                                        <!--begin::Close-->
                                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                            <i class="bi bi-x-lg"></i>
                                        </div>
                                        <!--end::Close-->
                                    </div>

                                    <div class="modal-body">
                                        <p>{{$item->message}}</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                        </td>
                        <!--begin::Date=-->
                        <td>{{$item->created_at->diffForHumans()}}</td>
                        <!--end::Date=-->
                        <!--begin::Action=-->
                        @can('delete contacts')
                        <td class="text-end">
                                    <a href="{{route('admin.contacts.delete' , $item->id)}}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
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
                        </td>
                        <!--end::Action=-->
                        @endcan
                    </tr>
                     @endforeach
                </tbody>
                <!--end::Table body-->
            </table>
            <!--end::Table-->
        </div>
        <!--end::Card body-->
    </div>


@endsection

@section('js')
   <script src="{{ asset('admin/plugins/custom/datatables/datatables.bundle.js') }}"></script>

    <script>
        $(document).ready(function() {
          $('#kt_contacts_table').DataTable({
            "paging": true,
          });
        });
    </script>
@endsection
