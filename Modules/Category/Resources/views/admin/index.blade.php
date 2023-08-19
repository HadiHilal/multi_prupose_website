@extends('admin.layout.base')

@section('title' , __('admin.Categories'))

@section('toolbar')

    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">

        <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
        <!--begin::Title-->
        <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">{{__('admin.Categories')}}</h1>
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
            <li class="breadcrumb-item text-dark">{{__('admin.Categories')}}</li>
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
                     <span class="card-label fw-bolder fs-3 mb-1">{{__('admin.Categories')}}</span>
                </div>
                <!--end::Search-->
            </div>
            <!--begin::Card title-->
            @can('add categories')
            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-subscription-table-toolbar="base">

                    <!--end::Menu 1-->
                    <!--end::Filter-->
                    <!--begin::Export-->
                    <button type="button" class="btn btn-light-primary me-3"  data-bs-toggle="modal" data-bs-target="#kt_modal_1" >
                                  <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
                                <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                        {{__('admin.AddNewCategory')}}</button>
                    <!--end::Export-->
                </div>
                <!--end::Toolbar-->
            </div>
            @endcan
            <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-0">
            <!--begin::Table-->
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_categories_table">
                <!--begin::Table head-->
                <thead>
                    <!--begin::Table row-->
                    <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                        <th></th>
                        <th>{{__('admin.Name')}}</th>
                        <th>{{__('admin.CreatedDate')}}</th>
                        <th class="text-end "></th>

                    </tr>
                    <!--end::Table row-->
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody class="text-gray-600 fw-bold">
                @foreach($categories as $key => $item)
                    <tr>
                        <td>
                            {{$key + 1}}
                        </td>
                        <!--begin::Customer=-->
                        <td>
                            {{$item->name}}
                        </td>
                        <!--end::Customer=-->
                        <!--begin::Date=-->
                        <td>{{$item->created_at}}</td>
                        <!--end::Date=-->
                        <!--begin::Action=-->

                        <td class="text-end">

                                       @can('edit categories')
                                        <a  class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1 edit_cat"  data-id="{{$item->id}}" data-name="{{$item->name}}" data-bs-toggle="modal" data-bs-target="#kt_modal_2">
                                            <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                            <span class="svg-icon svg-icon-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="black" />
                                                    <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="black" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </a>
                                        @endcan
                                        @can('delete categories')
                                        <a href="{{route('admin.categories.delete' , $item->id)}}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
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
                                        @endcan

                        </td>
                        <!--end::Action=-->

                    </tr>
                     @endforeach
                </tbody>
                <!--end::Table body-->
            </table>
            <!--end::Table-->
        </div>
        <!--end::Card body-->
    </div>


<div class="modal fade" tabindex="-1" id="kt_modal_1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('admin.AddNewCategory')}}</h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <i class="bi bi-x-lg"></i>
                </div>
                <!--end::Close-->
            </div>

            <form method="POST" action="{{route('admin.categories.store')}}">
                @csrf

            <div class="modal-body">
                <div class="mb-10">
                    <label for="exampleFormControlInput1" class="required form-label">{{__('admin.Name')}}</label>
                    <input type="text" class="form-control form-control-solid" name="name" value="{{old('name')}}" placeholder="Ex: Science"/>
                      <div class="fv-plugins-message-container invalid-feedback">
                         <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">{{__('admin.Discard')}}</button>

                <button type="submit" class="btn btn-primary"  >{{__('admin.SaveChanges')}}</button>
            </div>
            </form>
        </div>
    </div>
</div>

    <div class="modal fade" tabindex="-1" id="kt_modal_2">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('admin.EditCategory')}}</h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                     <i class="bi bi-x-lg"></i>
                </div>
                <!--end::Close-->
            </div>

            <form method="POST" action="{{route('admin.categories.update')}}">
                @csrf
                <input type="hidden" id="cat_id" name="id" value="">
            <div class="modal-body">
                <div class="mb-10">
                    <label for="exampleFormControlInput1" class="required form-label">{{__('admin.Name')}}</label>
                    <input type="text" class="form-control form-control-solid" name="name" id="cat_name" value="" placeholder="Ex: Science"/>
                      <div class="fv-plugins-message-container invalid-feedback">
                         <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">{{__('admin.Discard')}}</button>

                <button type="submit" class="btn btn-primary"  >{{__('admin.SaveChanges')}}</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')

   <script src="{{ asset('admin/plugins/custom/datatables/datatables.bundle.js') }}"></script>

    <script>
        $(document).ready(function() {
          $('#kt_categories_table').DataTable({
            "paging": true,
          });
          $('.edit_cat').on('click' , function (){
              var cat_id = $(this).data('id');
              var cat_name = $(this).data('name');
              $('#cat_id').val(cat_id);
              $('#cat_name').val(cat_name);
          })
  });
    </script>
@endsection
