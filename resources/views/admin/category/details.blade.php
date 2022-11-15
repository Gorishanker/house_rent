@extends('admin.layouts.base')
@section('content')
    @include('admin.layouts.components.header', [
        'title' => __('messages.edit', ['name' => trans_choice('content.product', 1)]),
        // 'breadcrumbs' => Breadcrumbs::render('admin.products.show'),
    ])

    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container">

            <!--begin::Basic info-->
            <div class="card mb-5 mb-xl-10">
                <!--begin::Content-->
                <div id="kt_account_profile_details">

                    <!--begin::Card body-->
                    <div class="card-body border-top p-9">

                        <!--begin::Input group-->
                        <div class="row mb-5">
                            <div class="col-md-6 fv-row">
                                <div class="fs-5 fw-bold mb-2">{{ trans_choice('content.category_title', 2) }}
                                </div>
                                <div class="fs-5 text-gray-600">{{ $category->name }}</div>
                            </div>
                        </div>

                        <div class="col-md-6 fv-row">
                            {{-- <!--begin::Label-->
                            <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                                <span class="">{{ trans_choice('content.products.upload_product_images', 1) }}</span>
                                <i class=" fas
                                fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                    title="Upload Product Image"></i>
                            </label>
                            <!--end::Label--> --}}

                            <!--begin::Select-->
                            {{-- <input type="file" name="product_images[]" id="product_image" class="form-control form-control-solid"
                                placeholder={{ __('placeholder.upload_image') }} multiple="true" accept="image/*">
                            <!--end::Select-->
                            <div class="form-group row">
                                <div class="col-lg-12 categoryImgPreview"></div>
                            </div> --}}
                            <div>
                                @if (!empty($category->category_images))
                                    @foreach ($category->category_images as $category_image)
                                        @php
                                            $image_id = $category->id;
                                        @endphp
                                        <div class="image-input image-input-outline category_div">
                                            <span
                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow dlete_category_img"
                                                data-id="{{ $image_id }}" data-bs-toggle="tooltip" title="Delete Category Image"
                                                style="transform: translate(70px,25px);">
                                                <i class="bi bi-x fs-2"></i>
                                            </span>
                                            <div class="image-input-wrapper w-80px h-80px m-2"
                                                style="background-image: url({{ $category_image->name }})"></div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-5">
                            {{-- <div class="col-md-6 fv-row">
                                <div class="fs-5 fw-bold mb-2">{{ trans_choice('content.quantity_title', 1) }}
                                </div>
                                <div class="fs-5 text-gray-600">{{ $category->quantity }}</div>
                            </div>
                            <div class="col-md-6 fv-row">
                                <div class="fs-5 fw-bold mb-2">{{ trans_choice('content.price_title', 1) }}</div>
                                <div class="fs-5 text-gray-600">{{ $category->price }}</div>
                            </div>
                        </div> --}}
                        <!--end::Input group-->

                    </div>
                    <!--end::Card body-->
                    <!--begin::Actions-->
                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                        <button type="button" class="btn btn-primary">
                            <a href="{{ route('admin.categories.index') }}"
                                class="text-white">{{ __('content.back_title') }}</a>
                        </button>
                    </div>
                    <!--end::Actions-->

                </div>
                <!--end::Content-->
            </div>
            <!--end::Basic info-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
@endsection
