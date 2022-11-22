@php
$title = isset($title) ? $title : 'Common-Setup';
$filter = isset($filter) ? $filter : false;
$export['status'] = isset($export['status']) ? $export['status'] : false;
$create_btn['status'] = isset($create_btn['status']) ? $create_btn['status'] : false;

$btn['status'] = isset($btn['status']) ? $btn['status'] : false;
$btn['classname'] = isset($btn['classname']) ? $btn['classname'] : 'btn-primary';

$import['status'] = isset($import['status']) ? $import['status'] : false;

$add_new['status'] = isset($add_new['status']) ? $add_new['status'] : false;

@endphp
<!--begin::Custom Page Header Toolbar-->
<div class="toolbar" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
        <!--begin::Page title-->
        <div data-kt-place="true" data-kt-place-mode="prepend" data-kt-place-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center me-3 flex-wrap mb-5 mb-lg-0 lh-1">
            <!--begin::Title-->
            <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">{{ $title }}</h1>
            <!--end::Title-->

            <!--begin::Separator-->
            <span class="h-20px border-gray-200 border-start mx-4"></span>
            <!--end::Separator-->

            <!--begin::Breadcrumb-->
            @if (isset($breadcrumbs))
            {!! $breadcrumbs !!}
            @endif
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->

        <!--begin::Actions-->
        <div class="d-flex align-items-center py-1">
            @if ($filter == true)
            <!--begin::Filter-->
            <button type="button" class="btn btn-light-primary me-3" id="kt_drawer_filter_button">
                <!--begin::Svg Icon | path: icons/duotone/Text/Filter.svg-->
                <span class="svg-icon svg-icon-2">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24" />
                            <path d="M5,4 L19,4 C19.2761424,4 19.5,4.22385763 19.5,4.5 C19.5,4.60818511 19.4649111,4.71345191 19.4,4.8 L14,12 L14,20.190983 C14,20.4671254 13.7761424,20.690983 13.5,20.690983 C13.4223775,20.690983 13.3458209,20.6729105 13.2763932,20.6381966 L10,19 L10,12 L4.6,4.8 C4.43431458,4.5790861 4.4790861,4.26568542 4.7,4.1 C4.78654809,4.03508894 4.89181489,4 5,4 Z" fill="#000000" />
                        </g>
                    </svg>
                </span>
                <!--end::Svg Icon-->{{ trans_choice('content.filter', 1) }}
            </button>
            <!--end::Filter-->
            @endif
            @if ($import['status'] == true)
            @if (isset($import['route']) && isset($import['format_file_route']))
            <!--begin::Wrapper-->
            <div class="me-4">
                <!--begin::Menu-->
                <a href="#" class="btn btn-sm btn-flex btn-light btn-active-primary fw-bolder" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
                    <!--begin::Svg Icon | path: icons/duotone/Text/Filter.svg-->
                    <span class="svg-icon svg-icon-5 svg-icon-gray-500 me-1">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24" />
                                <path d="M5,4 L19,4 C19.2761424,4 19.5,4.22385763 19.5,4.5 C19.5,4.60818511 19.4649111,4.71345191 19.4,4.8 L14,12 L14,20.190983 C14,20.4671254 13.7761424,20.690983 13.5,20.690983 C13.4223775,20.690983 13.3458209,20.6729105 13.2763932,20.6381966 L10,19 L10,12 L4.6,4.8 C4.43431458,4.5790861 4.4790861,4.26568542 4.7,4.1 C4.78654809,4.03508894 4.89181489,4 5,4 Z" fill="#000000" />
                            </g>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->{{ trans_choice('content.import', 1) }}
                </a>
                <!--begin::Menu 1-->
                <div class="menu menu-sub menu-sub-dropdown w-500px w-md-500px" data-kt-menu="true">
                    <!--begin::Header-->
                    <div class="px-7 py-5">
                        <div class="fs-5 text-dark fw-bolder">{{ trans_choice('content.select_file', 1) }}
                        </div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Menu separator-->
                    <div class="separator border-gray-200"></div>
                    <!--end::Menu separator-->
                    <!--begin::Form-->
                    <form action="{{ $import['route'] }} " method="post" id='import_data' class="form" enctype="multipart/form-data">
                        @csrf
                        <div class="px-7 py-5">
                            <!--begin::Input group-->
                            <div class="mb-5">
                                <label class="form-label fw-bold">{{ trans_choice('content.import', 1) }}:</label>
                                <div>
                                    <input type="file" name="file" class="form-control" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" required>
                                </div>
                            </div>
                            <!--end::Input group-->

                            <!--begin::Actions-->
                            <div class="d-flex justify-content-end">

                                <button type="button" class="btn btn-primary me-2">
                                    <a href="{{ $import['format_file_route'] }}" target="_blank" class="text-white">{{ __('content.download_format_title') }}</a>
                                </button>

                                <button type="submit" class="btn btn-sm btn-info me-2">{{ __('content.import_title') }}</button>
                            </div>
                            <!--end::Actions-->
                        </div>
                    </form>
                    {{-- {!! Form::close() !!} --}}
                    <!--end::Form-->
                </div>
                <!--end::Menu 1-->
                <!--end::Menu-->
            </div>
            <!--end::Wrapper-->
            @endif
            @endif











            @if ($add_new['status'] == true)
            @if (isset($add_new['route']))
            <!--begin::Wrapper-->
            <div class="me-4">
                <!--begin::Menu-->
                <a href="#" class="btn btn-sm btn-flex btn-light btn-active-primary fw-bolder" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
                    <!--begin::Svg Icon | path: icons/duotone/Text/Filter.svg-->
                    <span class="svg-icon svg-icon-2 svg-icon-gray-500 me-1">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">

                            <rect fill="#000000" x="4" y="11" width="16" height="2" rx="1" />
                            <rect fill="#000000" opacity="0.5" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000)" x="4" y="11" width="16" height="2" rx="1" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->{{ trans_choice('content.properties.add_new',1) }}
                </a>
                <!--begin::Menu 1-->
                <div class="menu menu-sub menu-sub-dropdown w-500px w-md-500px" data-kt-menu="true">
                    <!--begin::Header-->
                    <div class="px-7 py-5">
                        <div class="fs-5 text-dark fw-bolder">{{ trans_choice('content.properties.add_new',1) }}
                        </div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Menu separator-->
                    <div class="separator border-gray-200"></div>
                    <!--end::Menu separator-->
                    <!--begin::Form-->
                    <form action="{{ $add_new['route'] }}" method="post" class="form" enctype="multipart/form-data" id="AddProperty">
                        @csrf
                        <div class="px-7 py-5">
                            <!--begin::Input group-->
                            <!--begin::Card body-->
                            <div class="card-body">


                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.title_title', 1) }}</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-4 fv-row">
                                {!! Form::text('title', null, ['placeholder' => trans_choice('content.title_title', 1), 'id'=>'title' , 'class' => 'form-control form-control-lg form-control-solid']) !!}
                                <span class="text-danger error-text address_err"></span>
                            </div>
                            <!--end::Col-->

                            <!--begin::Label-->
                            <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.rent_title', 1) }}</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-4 fv-row">
                                {!! Form::number('rent', null, ['placeholder' => trans_choice('content.rent_title', 1),'id'=>'rent', 'value' => 'Max', 'class' => 'form-control form-control-lg form-control-solid mb-3 mb-lg-0']) !!}
                                <span class="text-danger error-text address_err"></span>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-2 col-form-label fw-bold fs-6">
                                <span class="required">{{ trans_choice('content.address_title', 1) }}</span>
                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Quantity should be atleast 1."></i>
                            </label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-4 fv-row">
                                {!! Form::text('address', null, ['placeholder' => trans_choice('content.address_title', 1), 'id'=>'address' 'class' => 'form-control form-control-lg form-control-solid']) !!}
                                <span class="text-danger error-text address_err"></span>
                            </div>
                            <!--end::Col-->

                            <!--begin::Label-->
                            <label class="col-lg-2 col-form-label fw-bold fs-6">
                                <span class="required">{{ trans_choice('content.size_title', 1) }}</span>
                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Price should be Require."></i>
                            </label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-4 fv-row">
                                {!! Form::text('size', null, ['placeholder' => trans_choice('content.size_title', 1), 'id'=>'room_category', 'class' => 'form-control form-control-lg form-control-solid']) !!}
                                <span class="text-danger error-text address_err"></span>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-2 col-form-label fw-bold fs-6">
                                <span class="required">{{ trans_choice('content.room_category_title', 1) }}</span>
                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Quantity should be atleast 1."></i>
                            </label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-4 fv-row">
                                {!! Form::text('room_category', null, ['placeholder' => trans_choice('content.room_category_title', 1), 'id'=>'room_category', 'class' => 'form-control form-control-lg form-control-solid']) !!}
                                <span class="text-danger error-text address_err"></span>
                            </div>
                            <!--end::Col-->

                            <!--begin::Label-->
                            <label class="col-lg-2 col-form-label fw-bold fs-6">
                                <span class="required">{{ trans_choice('content.additional_facilities_title', 1) }}</span>
                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Price should be Require."></i>
                            </label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-4 fv-row">
                                {!! Form::text('additional_facilities', null, ['placeholder' => trans_choice('content.additional_facilities_title', 1), 'id'=>'additional_facilities', 'class' => 'form-control form-control-lg form-control-solid']) !!}
                                <span class="text-danger error-text address_err"></span>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-2 col-form-label fw-bold fs-6">
                                <span class="required">{{ trans_choice('content.apt_overview_title', 1) }}</span>
                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Quantity should be atleast 1."></i>
                            </label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-4 fv-row">
                                {!! Form::text('apt_overview', null, ['placeholder' => trans_choice('content.apt_overview_title', 1), 'id'=>'apt_overview', 'class' => 'form-control form-control-lg form-control-solid']) !!}
                                <span class="text-danger error-text address_err"></span>
                            </div>
                            <!--end::Col-->

                            <!--begin::Label-->
                            <label class="col-lg-2 col-form-label fw-bold fs-6">
                                <span class="required">{{ trans_choice('content.features_title', 1) }}</span>
                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Price should be Require."></i>
                            </label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-4 fv-row">
                                {!! Form::text('features', null, ['placeholder' => trans_choice('content.features_title', 1), 'id'=>'features', 'class' => 'form-control form-control-lg form-control-solid']) !!}
                                <span class="text-danger error-text address_err"></span>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="row mb-6">

                            <!--begin::Label-->
                            <label class="col-lg-2 col-form-label fw-bold fs-6">
                                <span class="">{{ trans_choice('content.upload_properties_images', 1) }}</span>
                                <i class=" fas
                fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Upload Property Image"></i>
                            </label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-4 fv-row">
                                <input type="file" name="property_images[]" id="property_image" class="form-control form-control-lg form-control-solid" placeholder={{ __('placeholder.upload_image') }} multiple="true" accept="image/*">
                            </div>
                            <!--end::Col-->
                            <div class="col-lg-6 propertyImgPreview"></div>

                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                {{-- <!--begin::Label-->
            <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                <span class="">{{ trans_choice('content.products.upload_product_images', 1) }}</span>
                                <i class=" fas
                fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Upload Product Image"></i>
                                </label>
                                <!--end::Label--> --}}

                                <!--begin::Select-->
                                {{-- <input type="file" name="product_images[]" id="product_image" class="form-control form-control-solid"
                placeholder={{ __('placeholder.upload_image') }} multiple="true" accept="image/*">
                                <!--end::Select-->
                                <div class="form-group row">
                                    <div class="col-lg-12 propertyImgPreview"></div>
                                </div> --}}
                                <div>
                                    @if (!empty($property->property_images))
                                    @foreach ($property->property_images as $property_image)
                                    @php
                                    $image_id = $property->id;
                                    @endphp
                                    <div class="image-input image-input-outline property_div">
                                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow dlete_property_img" data-id="{{ $image_id }}" data-bs-toggle="tooltip" title="Delete property Image" style="transform: translate(70px,25px);">
                                            <i class="bi bi-x fs-2"></i>
                                        </span>
                                        <div class="image-input-wrapper w-80px h-80px m-2" style="background-image: url({{ $property_image->name }})"></div>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                </div>
                <!--end::Card body-->

                @push('scripts')
                <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
                {!! JsValidator::formRequest('App\Http\Requests\Admin\PropertyRequest', 'form') !!}

                <script>
                    $('#property_image').on('change', function() {
                        multipleImagesPreview(this, 'div.propertyImgPreview');
                    });

                    $(document).on('click', '.dlete_property_img', function() {
                        var id = $(this).data('id');
                        var elem = $(this).parents('.property_div');
                        var url = `{{ url('/') }}/admin/properties/delete-images/` + id;
                        deleteImage(url, elem);
                    });

                </script>
                @endpush
                <!--end::Input group-->

                <!--begin::Actions-->
                <div class="d-flex justify-content-end">

                    {{-- <button type="submit" id="add_property_btn" class="btn btn-primary">{{ __('content.create_title') }}</button> --}}

                    <button type="button" id="add_property_btn" name="submit" class="btn btn-primary">{{ trans_choice('content.properties.add_new',1) }}</button>
                </div>
                <!--end::Actions-->
            </div>
            </form>
            {{-- {!! Form::close() !!} --}}
            <!--end::Form-->
        </div>
        <!--end::Menu 1-->
        <!--end::Menu-->
    </div>
    <!--end::Wrapper-->
    @endif
    @endif




















    @if ($export['status'] == true)
    @if (isset($export['route']))
    <!--begin::Export-->
    <a href="javascript:void(0)" class="btn btn-info me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
        <!--begin::Svg Icon-->
        <span class="svg-icon svg-icon-5 svg-icon-gray-500 me-1">
            <i class="fas fa-download fw-bold-3"></i>
        </span>
        <!--end::Svg Icon-->{{ isset($export['name']) ? $export['name'] : __('content.export_title') }}
    </a>
    <!--begin::Menu-->
    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-info fw-bold fs-7 w-125px py-4" data-kt-menu="true">
        <input type="hidden" id="export_type" name="export" value="">
        <!--begin::Menu item-->
        <div class="menu-item px-3">
            <div class="menu-item px-3">
                <a target="_blank" href="{{ $export['route'] }}?export=excel" title="Excel" data-type="excel" class="menu-link px-3">{{ __('content.excel_title') }} </a>
            </div>
        </div>
        <!--end::Menu item-->
        <!--begin::Menu item-->
        <div class="menu-item px-3">
            <div class="menu-item px-3">
                <a target="_blank" href="{{ $export['route'] }}?export=csv" title="CSV" data-type="csv" class="menu-link px-3">{{ __('content.csv_title') }} </a>
            </div>
        </div>
        <!--end::Menu item-->
    </div>
    <!--end::Menu-->
    <!--end::Export-->
    @endif
    @endif
    @if ($create_btn['status'] == true)
    @if (isset($create_btn['route']) && isset($create_btn['name']))
    <!--begin::Add button-->
    <a href="{{ $create_btn['route'] }}" type="button" class="btn btn-primary me-3">
        <!--begin::Svg Icon | path: icons/duotone/Navigation/Plus.svg-->
        <span class="svg-icon svg-icon-2">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                <rect fill="#000000" x="4" y="11" width="16" height="2" rx="1" />
                <rect fill="#000000" opacity="0.5" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000)" x="4" y="11" width="16" height="2" rx="1" />
            </svg>
        </span>
        <!--end::Svg Icon-->{{ $create_btn['name'] }}
    </a>
    <!--end::Add button-->
    @endif
    @endif
    @if ($btn['status'] == true)
    @if (isset($btn['route']) && isset($btn['name']))
    <!--begin::Add button-->
    <a href="{{ $btn['route'] }}" type="button" class="btn me-3 {{ $btn['classname'] }}">{{ $btn['name'] }}</a>
    <!--end::Add button-->
    @endif
    @endif
</div>
<!--end::Actions-->


</div>
<!--end::Container-->
</div>
<!--end::Custom Page Header Toolbar-->

