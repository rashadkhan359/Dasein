@extends('admin.layouts.master')
@section('title', $brand->name)
@section('css')
    <!-- extra css -->
@endsection
@section('content')
    {{-- <x-breadcrumb title="Settings" pagetitle="Toner" /> --}}

    <div class="row">
        <div class="col-lg-12">
            <div class="card border-0 border-bottom border-bottom-dashed shadow-none mx-n4 mt-n4">
                <div class="card-body profile-basic position-relative"
                    style="background-image: url({{ asset('build/images/profile-bg.jpg') }});background-size: cover;background-position: center;">
                    <div class="bg-primary bg-opacity-75 position-absolute start-0 end-0 top-0 bottom-0"></div>
                </div>
                <div class="card-body position-relative mt-n3">
                    <div class="mt-n5">
                        <div class="avatar-lg">
                            <div class="avatar-title bg-white shadow rounded">
                                <img src="{{ asset('storage/' . $brand->image) }}" alt="{{ $brand->name . '-logo' }}" class="avatar-sm">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="row justify-content-between gy-4">
                        <div class="col-xl-5 col-md-7">
                            <h5 class="mb-2">{{ $brand->name }}<i
                                    class="ph-circle-wavy-check-fill text-primary align-top fs-15"></i></h5>
                            <p><b>Since: {{ $brand->founded_at ?? '-' }}</b>. {{ $brand->mini_description ?? '-' }}</p>
                            {{-- <div class="mb-2 text-muted">
                                <i class="bi bi-geo-alt align-middle me-1"></i> Phoenix, USA
                            </div> --}}

                            <div class="mb-2 text-muted">
                                <i class="bi bi-envelope align-middle me-1"></i> {{ $brand->email ?? '-' }}
                            </div>
                            <div class="text-muted">
                                <i class="bi bi-globe align-middle me-1"></i> {{ $brand->website ?? '-' }}
                            </div>
                        </div>
                        {{-- <div class="col-xl-3 col-md-5">
                            <div class="d-flex flex-column h-100">
                                <div class="d-flex justify-content-end gap-3 mb-2">
                                    <div class="text-end">
                                        <h5 class="fs-18 mb-1">Edward Diana</h5>
                                        <p class="text-muted mb-2">Owner & CEO</p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <img src="{{ URL::asset('build/images/users/avatar-1.jpg') }}" alt=""
                                            class="avatar-sm rounded-circle">
                                    </div>
                                </div>
                                <div class="text-end mt-auto">
                                    <button type="button" class="btn btn-info">Contact Us</button>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
            <!--end card-->
        </div>
        <!--end col-->
    </div>
    <!--end row-->

    <div class="row g-3 align-items-center mb-4">
        <div class="col-lg-3 me-auto">
            <h5 class="fs-17 mb-0">Products from {{ $brand->name }}</h5>
        </div>
        <!--end col-->
        <div class="col-lg-2">
            <div class="search-box">
                <input type="text" class="form-control search" placeholder="Search for products...">
                <i class="ri-search-line search-icon"></i>
            </div>
        </div>
        <!--end col-->
        <div class="col-lg-auto">
            <a href="product-create" class="btn btn-primary">Add Product</a>
        </div>
        <!--end col-->
    </div>
    <!--end row-->

    <div class="row row-cols-xxl-5 row-cols-md-2 row-cols-1">
        <div class="col">
            <div class="card overflow-hidden element-item">
                <div class="bg-light py-4">
                    <div class="gallery-product">
                        <img src="{{ URL::asset('build/images/products/img-8.png') }}" alt=""
                            style="max-height: 215px;max-width: 100%;" class="mx-auto d-block">
                    </div>
                    <p class="fs-12 fw-medium badge bg-danger py-2 px-3 product-lable mb-0 align-middle">Best Arrival</p>
                    <div class="gallery-product-actions">
                        <div class="mb-2">
                            <button type="button" class="btn btn-danger avatar-xs custom-toggle" data-bs-toggle="button">
                                <span class="avatar-title">
                                    <span class="icon-on"><i class="mdi mdi-heart-outline align-bottom fs-15"></i></span>
                                    <span class="icon-off"><i class="mdi mdi-heart align-bottom fs-15"></i></span>
                                </span>
                            </button>
                        </div>
                        <div>
                            <button type="button" class="btn btn-success avatar-xs custom-toggle" data-bs-toggle="button">
                                <span class="avatar-title">
                                    <span class="icon-on"><i class="mdi mdi-eye-outline align-bottom fs-15"></i></span>
                                    <span class="icon-off"><i class="mdi mdi-eye align-bottom fs-15"></i></span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="product-btn px-3">
                        <a href="#!" class="btn btn-primary btn-sm w-75 add-btn"><i class="mdi mdi-cart me-1"></i> Add
                            to Cart</a>
                    </div>
                </div>
                <div class="card-body">
                    <div>
                        <ul class="clothe-colors list-unstyled hstack gap-1 mb-3 flex-wrap d-none">
                            <li>
                                <input type="radio" name="sizes1" id="product-color-12">
                                <label
                                    class="avatar-xxs border border-2 border-white btn btn-success p-0 d-flex align-items-center justify-content-center rounded-circle"
                                    for="product-color-12"></label>
                            </li>
                            <li>
                                <input type="radio" name="sizes1" id="product-color-13">
                                <label
                                    class="avatar-xxs border border-2 border-white btn btn-info p-0 d-flex align-items-center justify-content-center rounded-circle"
                                    for="product-color-13"></label>
                            </li>
                            <li>
                                <input type="radio" name="sizes1" id="product-color-14">
                                <label
                                    class="avatar-xxs border border-2 border-white btn btn-warning p-0 d-flex align-items-center justify-content-center rounded-circle"
                                    for="product-color-14"></label>
                            </li>
                            <li>
                                <input type="radio" name="sizes1" id="product-color-15">
                                <label
                                    class="avatar-xxs border border-2 border-white btn btn-danger p-0 d-flex align-items-center justify-content-center rounded-circle"
                                    for="product-color-15"></label>
                            </li>
                        </ul>
                        <a href="product-overview">
                            <h6 class="fs-18 lh-base text-truncate mb-0 text-capitalize">World's most expensive t-shirt
                            </h6>
                        </a>
                        <div class="mt-3">
                            <span class="float-end">4.9 <i class="ri-star-half-fill text-warning align-bottom"></i></span>
                            <h5 class="mb-0 fs-16">$266.24 <span class="text-muted fs-14"><del>$354.99</del></span></h5>
                        </div>
                    </div>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
    </div>
    <!--end row-->

    <div class="row g-0 text-center text-sm-start align-items-center mb-3">
        <div class="col-sm-6">
            <div>
                <p class="mb-sm-0">Showing <b>1</b> to <b>10</b> of <b>18</b> entries</p>
            </div>
        </div> <!-- end col -->
        <div class="col-sm-6">
            <ul
                class="pagination pagination-separated justify-content-center justify-content-sm-end flex-wrap gap-1 gap-sm-0 mb-sm-0">
                <li class="page-item disabled"> <a href="#" class="page-link">Previous</a> </li>
                <li class="page-item active"> <a href="#" class="page-link">1</a> </li>
                <li class="page-item "> <a href="#" class="page-link">2</a> </li>
                <li class="page-item"> <a href="#" class="page-link">3</a> </li>
                <li class="page-item"> <a href="#" class="page-link">4</a> </li>
                <li class="page-item"> <a href="#" class="page-link">5</a> </li>
                <li class="page-item"> <a href="#" class="page-link">Next</a></li>
            </ul>
        </div><!-- end col -->
    </div>
@endsection
@section('scripts')
    <!-- App js -->
    {{-- <script src="{{ URL::asset('build/js/app.js') }}"></script> --}}
@endsection
