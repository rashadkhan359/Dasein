@extends('layouts.master')
@section('title')
    Product Grid Right Sidebar
@endsection
@section('css')
    <!-- extra css -->
    <!-- nouisliderribute css -->
    <link rel="stylesheet" href="{{ URL::asset('build/libs/nouislider/nouislider.min.css') }}">
@endsection
@section('content')
    <section class="ecommerce-about"
        style="background-image: url('build/images/profile-bg.jpg'); background-size: cover;background-position: center;">
        <div class="bg-overlay bg-primary" style="opacity: 0.85;"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="text-center">
                        <h1 class="text-white mb-0">Product Grid Right Sidebar</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-light justify-content-center mt-4">
                                <li class="breadcrumb-item"><a href="#">Product</a></li>
                                <li class="breadcrumb-item"><a href="#">Grid View</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Right Sidebar</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--end conatiner-->
    </section>

    <div class="position-relative section">
        <div class="container">
            <div class="ecommerce-product gap-4">
                <div class="flex-grow-1">
                    <div class="d-flex align-items-center gap-2 mb-4">
                        <p class="text-muted flex-grow-1 mb-0">Showing 1-12 of 84 results</p>

                        <div class="flex-shrink-0">
                            <select class="form-select w-md" id="sort-elem">
                                <option value="">All</option>
                                <option value="low_to_high">Low to High</option>
                                <option value="high_to_low">High to Low</option>
                            </select>
                        </div>
                    </div>
                    <div class="row" id="product-grid-right">
                        <div class="col-xxl-4 col-lg-6">
                            <div class="card overflow-hidden element-item">
                                <div class="bg-dark-subtle py-4">
                                    <div class="gallery-product">
                                        <img src="{{ URL::asset('build/images/products/img-8.png') }}" alt=""
                                            style="max-height: 215px;max-width: 100%;" class="mx-auto d-block">
                                    </div>
                                    <p class="fs-11 fw-medium badge bg-primary py-2 px-3 product-lable mb-0">Best Arrival
                                    </p>
                                    <div class="gallery-product-actions">
                                        <div class="mb-2">
                                            <button type="button" class="btn btn-danger btn-sm custom-toggle"
                                                data-bs-toggle="button">
                                                <span class="icon-on"><i
                                                        class="mdi mdi-heart-outline align-bottom fs-15"></i></span>
                                                <span class="icon-off"><i
                                                        class="mdi mdi-heart align-bottom fs-15"></i></span>
                                            </button>
                                        </div>
                                        <div>
                                            <button type="button" class="btn btn-success btn-sm custom-toggle"
                                                data-bs-toggle="button">
                                                <span class="icon-on"><i
                                                        class="mdi mdi-eye-outline align-bottom fs-15"></i></span>
                                                <span class="icon-off"><i class="mdi mdi-eye align-bottom fs-15"></i></span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="product-btn px-3">
                                        <a href="#!" class="btn btn-primary btn-sm w-75 add-btn"><i
                                                class="mdi mdi-cart me-1"></i> Add to Cart</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div>
                                        <a href="#!">
                                            <h6 class="fs-16 lh-base text-truncate mb-0">World's most expensive t shirt</h6>
                                        </a>
                                        <div class="mt-3">
                                            <span class="float-end">4.9 <i
                                                    class="ri-star-half-fill text-warning align-bottom"></i></span>
                                            <h5 class="text-secondary mb-0">$124.99 <span
                                                    class="text-muted fs-12"><del>$354.99</del></span></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-xxl-4 col-lg-6">
                            <div class="card overflow-hidden element-item">
                                <div class="bg-secondary-subtle py-4">
                                    <div class="gallery-product">
                                        <img src="{{ URL::asset('build/images/products/img-15.png') }}" alt=""
                                            style="max-height: 215px;max-width: 100%;" class="mx-auto d-block">
                                    </div>
                                    <div class="gallery-product-actions">
                                        <div class="mb-2">
                                            <button type="button" class="btn btn-danger btn-sm custom-toggle"
                                                data-bs-toggle="button">
                                                <span class="icon-on"><i
                                                        class="mdi mdi-heart-outline align-bottom fs-15"></i></span>
                                                <span class="icon-off"><i
                                                        class="mdi mdi-heart align-bottom fs-15"></i></span>
                                            </button>
                                        </div>
                                        <div>
                                            <button type="button" class="btn btn-success btn-sm custom-toggle"
                                                data-bs-toggle="button">
                                                <span class="icon-on"><i
                                                        class="mdi mdi-eye-outline align-bottom fs-15"></i></span>
                                                <span class="icon-off"><i class="mdi mdi-eye align-bottom fs-15"></i></span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="product-btn px-3">
                                        <a href="#!" class="btn btn-primary btn-sm w-75 add-btn"><i
                                                class="mdi mdi-cart me-1"></i> Add to Cart</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div>
                                        <a href="#!">
                                            <h6 class="fs-16 lh-base text-truncate mb-0">Like Style Women Black Handbag
                                            </h6>
                                        </a>
                                        <div class="mt-3">
                                            <span class="float-end">4.2 <i
                                                    class="ri-star-half-fill text-warning align-bottom"></i></span>
                                            <h5 class="text-secondary mb-0">$247.00 <span
                                                    class="text-muted fs-12"><del>$742.00</del></span></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-xxl-4 col-lg-6">
                            <div class="card overflow-hidden element-item">
                                <div class="bg-danger-subtle py-4">
                                    <div class="gallery-product">
                                        <img src="{{ URL::asset('build/images/products/img-1.png') }}" alt=""
                                            style="max-height: 215px;max-width: 100%;" class="mx-auto d-block">
                                    </div>
                                    <p class="fs-11 fw-medium badge bg-primary py-2 px-3 product-lable mb-0">Best Arrival
                                    </p>
                                    <div class="gallery-product-actions">
                                        <div class="mb-2">
                                            <button type="button" class="btn btn-danger btn-sm custom-toggle"
                                                data-bs-toggle="button">
                                                <span class="icon-on"><i
                                                        class="mdi mdi-heart-outline align-bottom fs-15"></i></span>
                                                <span class="icon-off"><i
                                                        class="mdi mdi-heart align-bottom fs-15"></i></span>
                                            </button>
                                        </div>
                                        <div>
                                            <button type="button" class="btn btn-success btn-sm custom-toggle"
                                                data-bs-toggle="button">
                                                <span class="icon-on"><i
                                                        class="mdi mdi-eye-outline align-bottom fs-15"></i></span>
                                                <span class="icon-off"><i
                                                        class="mdi mdi-eye align-bottom fs-15"></i></span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="product-btn px-3">
                                        <a href="#!" class="btn btn-primary btn-sm w-75 add-btn"><i
                                                class="mdi mdi-cart me-1"></i> Add to Cart</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div>
                                        <a href="#!">
                                            <h6 class="fs-16 lh-base text-truncate mb-0">Black Horn Backpack For Men Bags
                                                30 L Backpack</h6>
                                        </a>
                                        <div class="mt-3">
                                            <span class="float-end">3.8 <i
                                                    class="ri-star-half-fill text-warning align-bottom"></i></span>
                                            <h5 class="text-secondary mb-0">$96.00 <span
                                                    class="text-muted fs-12"><del>$742.00</del></span></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-xxl-4 col-lg-6">
                            <div class="card overflow-hidden element-item">
                                <div class="bg-info-subtle py-4">
                                    <div class="gallery-product">
                                        <img src="{{ URL::asset('build/images/products/img-7.png') }}" alt=""
                                            style="max-height: 215px;max-width: 100%;" class="mx-auto d-block">
                                    </div>
                                    <div class="gallery-product-actions">
                                        <div class="mb-2">
                                            <button type="button" class="btn btn-danger btn-sm custom-toggle"
                                                data-bs-toggle="button">
                                                <span class="icon-on"><i
                                                        class="mdi mdi-heart-outline align-bottom fs-15"></i></span>
                                                <span class="icon-off"><i
                                                        class="mdi mdi-heart align-bottom fs-15"></i></span>
                                            </button>
                                        </div>
                                        <div>
                                            <button type="button" class="btn btn-success btn-sm custom-toggle"
                                                data-bs-toggle="button">
                                                <span class="icon-on"><i
                                                        class="mdi mdi-eye-outline align-bottom fs-15"></i></span>
                                                <span class="icon-off"><i
                                                        class="mdi mdi-eye align-bottom fs-15"></i></span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="product-btn px-3">
                                        <a href="#!" class="btn btn-primary btn-sm w-75 add-btn"><i
                                                class="mdi mdi-cart me-1"></i> Add to Cart</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div>
                                        <a href="#!">
                                            <h6 class="fs-16 lh-base text-truncate mb-0">Innovative education book</h6>
                                        </a>
                                        <div class="mt-3">
                                            <span class="float-end">4.7 <i
                                                    class="ri-star-half-fill text-warning align-bottom"></i></span>
                                            <h5 class="text-secondary mb-0">$39.99 <span
                                                    class="text-muted fs-12"><del>$96.26</del></span></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-xxl-4 col-lg-6">
                            <div class="card overflow-hidden element-item">
                                <div class="bg-success-subtle py-4">
                                    <div class="gallery-product">
                                        <img src="{{ URL::asset('build/images/products/img-4.png') }}" alt=""
                                            style="max-height: 215px;max-width: 100%;" class="mx-auto d-block">
                                    </div>
                                    <p class="fs-11 fw-medium badge bg-primary py-2 px-3 product-lable mb-0">Best Arrival
                                    </p>
                                    <div class="gallery-product-actions">
                                        <div class="mb-2">
                                            <button type="button" class="btn btn-danger btn-sm custom-toggle"
                                                data-bs-toggle="button">
                                                <span class="icon-on"><i
                                                        class="mdi mdi-heart-outline align-bottom fs-15"></i></span>
                                                <span class="icon-off"><i
                                                        class="mdi mdi-heart align-bottom fs-15"></i></span>
                                            </button>
                                        </div>
                                        <div>
                                            <button type="button" class="btn btn-success btn-sm custom-toggle"
                                                data-bs-toggle="button">
                                                <span class="icon-on"><i
                                                        class="mdi mdi-eye-outline align-bottom fs-15"></i></span>
                                                <span class="icon-off"><i
                                                        class="mdi mdi-eye align-bottom fs-15"></i></span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="product-btn px-3">
                                        <a href="#!" class="btn btn-primary btn-sm w-75 add-btn"><i
                                                class="mdi mdi-cart me-1"></i> Add to Cart</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div>
                                        <a href="#!">
                                            <h6 class="fs-16 lh-base text-truncate mb-0">Sangria Girls Mint Green &
                                                Off-White Solid Open Toe Flats</h6>
                                        </a>
                                        <div class="mt-3">
                                            <span class="float-end">4.5 <i
                                                    class="ri-star-half-fill text-warning align-bottom"></i></span>
                                            <h5 class="text-secondary mb-0">$34.99 <span
                                                    class="text-muted fs-12"><del>$126.97</del></span></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-xxl-4 col-lg-6">
                            <div class="card overflow-hidden element-item">
                                <div class="bg-danger-subtle py-4">
                                    <div class="gallery-product">
                                        <img src="{{ URL::asset('build/images/products/img-5.png') }}" alt=""
                                            style="max-height: 215px;max-width: 100%;" class="mx-auto d-block">
                                    </div>
                                    <div class="gallery-product-actions">
                                        <div class="mb-2">
                                            <button type="button" class="btn btn-danger btn-sm custom-toggle"
                                                data-bs-toggle="button">
                                                <span class="icon-on"><i
                                                        class="mdi mdi-heart-outline align-bottom fs-15"></i></span>
                                                <span class="icon-off"><i
                                                        class="mdi mdi-heart align-bottom fs-15"></i></span>
                                            </button>
                                        </div>
                                        <div>
                                            <button type="button" class="btn btn-success btn-sm custom-toggle"
                                                data-bs-toggle="button">
                                                <span class="icon-on"><i
                                                        class="mdi mdi-eye-outline align-bottom fs-15"></i></span>
                                                <span class="icon-off"><i
                                                        class="mdi mdi-eye align-bottom fs-15"></i></span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="product-btn px-3">
                                        <a href="#!" class="btn btn-primary btn-sm w-75 add-btn"><i
                                                class="mdi mdi-cart me-1"></i> Add to Cart</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div>
                                        <a href="#!">
                                            <h6 class="fs-16 lh-base text-truncate mb-0">Lace-Up Casual Shoes For Men</h6>
                                        </a>
                                        <div class="mt-3">
                                            <span class="float-end">4.0 <i
                                                    class="ri-star-half-fill text-warning align-bottom"></i></span>
                                            <h5 class="text-secondary mb-0">$167.42 <span
                                                    class="text-muted fs-12"><del>$229.00</del></span></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-xxl-4 col-lg-6">
                            <div class="card overflow-hidden element-item">
                                <div class="bg-warning-subtle py-4">
                                    <div class="gallery-product">
                                        <img src="{{ URL::asset('build/images/products/img-6.png') }}" alt=""
                                            style="max-height: 215px;max-width: 100%;" class="mx-auto d-block">
                                    </div>
                                    <div class="gallery-product-actions">
                                        <div class="mb-2">
                                            <button type="button" class="btn btn-danger btn-sm custom-toggle"
                                                data-bs-toggle="button">
                                                <span class="icon-on"><i
                                                        class="mdi mdi-heart-outline align-bottom fs-15"></i></span>
                                                <span class="icon-off"><i
                                                        class="mdi mdi-heart align-bottom fs-15"></i></span>
                                            </button>
                                        </div>
                                        <div>
                                            <button type="button" class="btn btn-success btn-sm custom-toggle"
                                                data-bs-toggle="button">
                                                <span class="icon-on"><i
                                                        class="mdi mdi-eye-outline align-bottom fs-15"></i></span>
                                                <span class="icon-off"><i
                                                        class="mdi mdi-eye align-bottom fs-15"></i></span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="product-btn px-3">
                                        <a href="#!" class="btn btn-primary btn-sm w-75 add-btn"><i
                                                class="mdi mdi-cart me-1"></i> Add to Cart</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div>
                                        <a href="#!">
                                            <h6 class="fs-16 lh-base text-truncate mb-0">Striped High Neck Casual Men
                                                Orange Sweater</h6>
                                        </a>
                                        <div class="mt-3">
                                            <span class="float-end">4.8 <i
                                                    class="ri-star-half-fill text-warning align-bottom"></i></span>
                                            <h5 class="text-secondary mb-0">$87.30 <span
                                                    class="text-muted fs-12"><del>$120.00</del></span></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-xxl-4 col-lg-6">
                            <div class="card overflow-hidden element-item">
                                <div class="bg-secondary-subtle py-4">
                                    <div class="gallery-product">
                                        <img src="{{ URL::asset('build/images/products/img-3.png') }}" alt=""
                                            style="max-height: 215px;max-width: 100%;" class="mx-auto d-block">
                                    </div>
                                    <div class="gallery-product-actions">
                                        <div class="mb-2">
                                            <button type="button" class="btn btn-danger btn-sm custom-toggle"
                                                data-bs-toggle="button">
                                                <span class="icon-on"><i
                                                        class="mdi mdi-heart-outline align-bottom fs-15"></i></span>
                                                <span class="icon-off"><i
                                                        class="mdi mdi-heart align-bottom fs-15"></i></span>
                                            </button>
                                        </div>
                                        <div>
                                            <button type="button" class="btn btn-success btn-sm custom-toggle"
                                                data-bs-toggle="button">
                                                <span class="icon-on"><i
                                                        class="mdi mdi-eye-outline align-bottom fs-15"></i></span>
                                                <span class="icon-off"><i
                                                        class="mdi mdi-eye align-bottom fs-15"></i></span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="product-btn px-3">
                                        <a href="#!" class="btn btn-primary btn-sm w-75 add-btn"><i
                                                class="mdi mdi-cart me-1"></i> Add to Cart</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div>
                                        <a href="#!">
                                            <h6 class="fs-16 lh-base text-truncate mb-0">Ninja Pro Max Smartwatch</h6>
                                        </a>
                                        <div class="mt-3">
                                            <span class="float-end">3.6 <i
                                                    class="ri-star-half-fill text-warning align-bottom"></i></span>
                                            <h5 class="text-secondary mb-0">$213.00 <span
                                                    class="text-muted fs-12"><del>$303.99</del></span></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-xxl-4 col-lg-6">
                            <div class="card overflow-hidden element-item">
                                <div class="bg-success-subtle py-4">
                                    <div class="gallery-product">
                                        <img src="{{ URL::asset('build/images/products/img-2.png') }}" alt=""
                                            style="max-height: 215px;max-width: 100%;" class="mx-auto d-block">
                                    </div>
                                    <p class="fs-11 fw-medium badge bg-primary py-2 px-3 product-lable mb-0">Best Arrival
                                    </p>
                                    <div class="gallery-product-actions">
                                        <div class="mb-2">
                                            <button type="button" class="btn btn-danger btn-sm custom-toggle"
                                                data-bs-toggle="button">
                                                <span class="icon-on"><i
                                                        class="mdi mdi-heart-outline align-bottom fs-15"></i></span>
                                                <span class="icon-off"><i
                                                        class="mdi mdi-heart align-bottom fs-15"></i></span>
                                            </button>
                                        </div>
                                        <div>
                                            <button type="button" class="btn btn-success btn-sm custom-toggle"
                                                data-bs-toggle="button">
                                                <span class="icon-on"><i
                                                        class="mdi mdi-eye-outline align-bottom fs-15"></i></span>
                                                <span class="icon-off"><i
                                                        class="mdi mdi-eye align-bottom fs-15"></i></span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="product-btn px-3">
                                        <a href="#!" class="btn btn-primary btn-sm w-75 add-btn"><i
                                                class="mdi mdi-cart me-1"></i> Add to Cart</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div>
                                        <a href="#!">
                                            <h6 class="fs-16 lh-base text-truncate mb-0">Opinion Striped Round Neck Green
                                                T-shirt</h6>
                                        </a>
                                        <div class="mt-3">
                                            <span class="float-end">4.2 <i
                                                    class="ri-star-half-fill text-warning align-bottom"></i></span>
                                            <h5 class="text-secondary mb-0">$63.00 <span
                                                    class="text-muted fs-12"><del>$123.99</del></span></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                    <div class="row" id="pagination-element">
                        <div class="col-lg-12">
                            <div
                                class="pagination-block pagination pagination-separated justify-content-center justify-content-sm-end mb-sm-0">
                                <div class="page-item">
                                    <a href="javascript:void(0);" class="page-link" id="page-prev">Previous</a>
                                </div>
                                <span id="page-num" class="pagination"></span>
                                <div class="page-item">
                                    <a href="javascript:void(0);" class="page-link" id="page-next">Next</a>
                                </div>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->

                    <div class="row d-none" id="search-result-elem">
                        <div class="col-lg-12">
                            <div class="text-center py-5">
                                <div class="avatar-lg mx-auto mb-4">
                                    <div class="avatar-title bg-primary-subtle text-primary rounded-circle fs-24">
                                        <i class="bi bi-search"></i>
                                    </div>
                                </div>

                                <h5>No matching records found</h5>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div>
                <div class="sidebar small-sidebar flex-shrink-0">
                    <div class="card overflow-hidden">
                        <div class="card-header">
                            <div class="d-flex mb-3">
                                <div class="flex-grow-1">
                                    <h5 class="fs-16">Filters</h5>
                                </div>
                                <div class="flex-shrink-0">
                                    <a href="#" class="text-decoration-underline" id="clearall">Clear All</a>
                                </div>
                            </div>

                            <div class="search-box">
                                <input type="text" class="form-control" id="searchProductList" autocomplete="off"
                                    placeholder="Search Products...">
                                <i class="ri-search-line search-icon"></i>
                            </div>
                        </div>

                        <div class="accordion accordion-flush filter-accordion">

                            <div class="card-body border-bottom">
                                <div>
                                    <p class="text-muted text-uppercase fs-12 fw-medium mb-3">Products</p>
                                    <ul class="list-unstyled mb-0 filter-list">
                                        <li>
                                            <a href="#" class="d-flex py-1 align-items-center">
                                                <div class="flex-grow-1">
                                                    <h5 class="fs-13 mb-0 listname">Grocery</h5>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="d-flex py-1 align-items-center">
                                                <div class="flex-grow-1">
                                                    <h5 class="fs-13 mb-0 listname">Fashion</h5>
                                                </div>
                                                <div class="flex-shrink-0 ms-2">
                                                    <span class="badge bg-light text-muted">5</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="d-flex py-1 align-items-center">
                                                <div class="flex-grow-1">
                                                    <h5 class="fs-13 mb-0 listname">Watches</h5>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="d-flex py-1 align-items-center">
                                                <div class="flex-grow-1">
                                                    <h5 class="fs-13 mb-0 listname">Electronics</h5>
                                                </div>
                                                <div class="flex-shrink-0 ms-2">
                                                    <span class="badge bg-light text-muted">5</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="d-flex py-1 align-items-center">
                                                <div class="flex-grow-1">
                                                    <h5 class="fs-13 mb-0 listname">Furniture</h5>
                                                </div>
                                                <div class="flex-shrink-0 ms-2">
                                                    <span class="badge bg-light text-muted">6</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="d-flex py-1 align-items-center">
                                                <div class="flex-grow-1">
                                                    <h5 class="fs-13 mb-0 listname">Automotive Accessories</h5>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="d-flex py-1 align-items-center">
                                                <div class="flex-grow-1">
                                                    <h5 class="fs-13 mb-0 listname">Appliances</h5>
                                                </div>
                                                <div class="flex-shrink-0 ms-2">
                                                    <span class="badge bg-light text-muted">7</span>
                                                </div>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#" class="d-flex py-1 align-items-center">
                                                <div class="flex-grow-1">
                                                    <h5 class="fs-13 mb-0 listname">Kids</h5>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="card-body border-bottom">
                                <p class="text-muted text-uppercase fs-12 fw-medium mb-4">Price</p>

                                <div id="product-price-range" data-slider-color="info"></div>
                                <div class="formCost d-flex gap-2 align-items-center mt-3">
                                    <input class="form-control form-control-sm" type="text" id="minCost"
                                        value="0"> <span class="fw-semibold text-muted">to</span> <input
                                        class="form-control form-control-sm" type="text" id="maxCost"
                                        value="1000">
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingColors">
                                    <button class="accordion-button bg-transparent shadow-none" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#flush-collapseColors"
                                        aria-expanded="true" aria-controls="flush-collapseColors">
                                        <span class="text-muted text-uppercase fs-12 fw-medium">Colors</span> <span
                                            class="badge bg-success rounded-pill align-middle ms-1 filter-badge"></span>
                                    </button>
                                </h2>

                                <div id="flush-collapseColors" class="accordion-collapse collapse show"
                                    aria-labelledby="flush-headingColors">
                                    <div class="accordion-body text-body pt-0">
                                        <ul class="clothe-colors list-unstyled hstack gap-3 mb-0 flex-wrap"
                                            id="color-filter">
                                            <li>
                                                <input type="radio" name="colors" value="success" id="color-1">
                                                <label
                                                    class="avatar-xs btn btn-success p-0 d-flex align-items-center justify-content-center rounded-circle"
                                                    for="color-1"></label>
                                            </li>
                                            <li>
                                                <input type="radio" name="colors" value="info" id="color-2">
                                                <label
                                                    class="avatar-xs btn btn-info p-0 d-flex align-items-center justify-content-center rounded-circle"
                                                    for="color-2"></label>
                                            </li>
                                            <li>
                                                <input type="radio" name="colors" value="warning" id="color-3">
                                                <label
                                                    class="avatar-xs btn btn-warning p-0 d-flex align-items-center justify-content-center rounded-circle"
                                                    for="color-3"></label>
                                            </li>
                                            <li>
                                                <input type="radio" name="colors" value="danger" id="color-4">
                                                <label
                                                    class="avatar-xs btn btn-danger p-0 d-flex align-items-center justify-content-center rounded-circle"
                                                    for="color-4"></label>
                                            </li>
                                            <li>
                                                <input type="radio" name="colors" value="primary" id="color-5">
                                                <label
                                                    class="avatar-xs btn btn-primary p-0 d-flex align-items-center justify-content-center rounded-circle"
                                                    for="color-5"></label>
                                            </li>
                                            <li>
                                                <input type="radio" name="colors" value="secondary" id="color-6">
                                                <label
                                                    class="avatar-xs btn btn-secondary p-0 d-flex align-items-center justify-content-center rounded-circle"
                                                    for="color-6"></label>
                                            </li>
                                            <li>
                                                <input type="radio" name="colors" value="dark" id="color-7">
                                                <label
                                                    class="avatar-xs btn btn-dark p-0 d-flex align-items-center justify-content-center rounded-circle"
                                                    for="color-7"></label>
                                            </li>
                                            <li>
                                                <input type="radio" name="colors" value="light" id="color-8">
                                                <label
                                                    class="avatar-xs btn btn-light p-0 d-flex align-items-center justify-content-center rounded-circle"
                                                    for="color-8"></label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- end accordion-item -->

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingSize">
                                    <button class="accordion-button bg-transparent shadow-none" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#flush-collapseSize"
                                        aria-expanded="true" aria-controls="flush-collapseSize">
                                        <span class="text-muted text-uppercase fs-12 fw-medium">Sizes</span> <span
                                            class="badge bg-success rounded-pill align-middle ms-1 filter-badge"></span>
                                    </button>
                                </h2>

                                <div id="flush-collapseSize" class="accordion-collapse collapse show"
                                    aria-labelledby="flush-headingSize">
                                    <div class="accordion-body text-body pt-0">
                                        <ul class="clothe-size list-unstyled hstack gap-3 mb-0 flex-wrap"
                                            id="size-filter">
                                            <li>
                                                <input type="radio" name="sizes" value="xs" id="sizeXs">
                                                <label
                                                    class="avatar-xs btn btn-soft-primary p-0 d-flex align-items-center justify-content-center rounded-circle"
                                                    for="sizeXs">XS</label>
                                            </li>
                                            <li>
                                                <input type="radio" name="sizes" value="s" id="sizeS">
                                                <label
                                                    class="avatar-xs btn btn-soft-primary p-0 d-flex align-items-center justify-content-center rounded-circle"
                                                    for="sizeS">S</label>
                                            </li>
                                            <li>
                                                <input type="radio" name="sizes" value="m" id="sizeM">
                                                <label
                                                    class="avatar-xs btn btn-soft-primary p-0 d-flex align-items-center justify-content-center rounded-circle"
                                                    for="sizeM">M</label>
                                            </li>
                                            <li>
                                                <input type="radio" name="sizes" value="l" id="sizeL">
                                                <label
                                                    class="avatar-xs btn btn-soft-primary p-0 d-flex align-items-center justify-content-center rounded-circle"
                                                    for="sizeL">L</label>
                                            </li>
                                            <li>
                                                <input type="radio" name="sizes" value="xl" id="sizeXl">
                                                <label
                                                    class="avatar-xs btn btn-soft-primary p-0 d-flex align-items-center justify-content-center rounded-circle"
                                                    for="sizeXl">XL</label>
                                            </li>
                                            <li>
                                                <input type="radio" name="sizes" value="2xl" id="size2xl">
                                                <label
                                                    class="avatar-xs btn btn-soft-primary p-0 d-flex align-items-center justify-content-center rounded-circle"
                                                    for="size2xl">2XL</label>
                                            </li>
                                            <li>
                                                <input type="radio" name="sizes" value="3xl" id="size3xl">
                                                <label
                                                    class="avatar-xs btn btn-soft-primary p-0 d-flex align-items-center justify-content-center rounded-circle"
                                                    for="size3xl">3XL</label>
                                            </li>
                                            <li>
                                                <input type="radio" name="sizes" value="4xl" id="size4xl">
                                                <label
                                                    class="avatar-xs btn btn-soft-primary p-0 d-flex align-items-center justify-content-center rounded-circle"
                                                    for="size4xl">4XL</label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- end accordion-item -->

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingBrands">
                                    <button class="accordion-button bg-transparent shadow-none" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#flush-collapseBrands"
                                        aria-expanded="true" aria-controls="flush-collapseBrands">
                                        <span class="text-muted text-uppercase fs-12 fw-medium">Brands</span> <span
                                            class="badge bg-success rounded-pill align-middle ms-1 filter-badge"></span>
                                    </button>
                                </h2>

                                <div id="flush-collapseBrands" class="accordion-collapse collapse show"
                                    aria-labelledby="flush-headingBrands">
                                    <div class="accordion-body text-body pt-0">
                                        <div class="search-box search-box-sm">
                                            <input type="text" class="form-control bg-light border-0"
                                                id="searchBrandsList" placeholder="Search Brands...">
                                            <i class="ri-search-line search-icon"></i>
                                        </div>
                                        <div class="d-flex flex-column gap-2 mt-3 filter-check">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="Boat"
                                                    id="productBrandRadio5">
                                                <label class="form-check-label" for="productBrandRadio5">Boat</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="OnePlus"
                                                    id="productBrandRadio4">
                                                <label class="form-check-label" for="productBrandRadio4">OnePlus</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="Realme"
                                                    id="productBrandRadio3">
                                                <label class="form-check-label" for="productBrandRadio3">Realme</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="Sony"
                                                    id="productBrandRadio2">
                                                <label class="form-check-label" for="productBrandRadio2">Sony</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="JBL"
                                                    id="productBrandRadio1">
                                                <label class="form-check-label" for="productBrandRadio1">JBL</label>
                                            </div>

                                            <div>
                                                <button type="button"
                                                    class="btn btn-link text-decoration-none text-uppercase fw-medium p-0">1,235
                                                    More</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end accordion-item -->

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingDiscount">
                                    <button class="accordion-button bg-transparent shadow-none collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#flush-collapseDiscount"
                                        aria-expanded="true" aria-controls="flush-collapseDiscount">
                                        <span class="text-muted text-uppercase fs-12 fw-medium">Discount</span> <span
                                            class="badge bg-success rounded-pill align-middle ms-1 filter-badge"></span>
                                    </button>
                                </h2>
                                <div id="flush-collapseDiscount" class="accordion-collapse collapse"
                                    aria-labelledby="flush-headingDiscount">
                                    <div class="accordion-body text-body pt-1">
                                        <div class="d-flex flex-column gap-2 filter-check" id="discount-filter">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="50"
                                                    id="productdiscountRadio6">
                                                <label class="form-check-label" for="productdiscountRadio6">50% or
                                                    more</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="40"
                                                    id="productdiscountRadio5">
                                                <label class="form-check-label" for="productdiscountRadio5">40% or
                                                    more</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="30"
                                                    id="productdiscountRadio4">
                                                <label class="form-check-label" for="productdiscountRadio4">
                                                    30% or more
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="20"
                                                    id="productdiscountRadio3">
                                                <label class="form-check-label" for="productdiscountRadio3">
                                                    20% or more
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="10"
                                                    id="productdiscountRadio2">
                                                <label class="form-check-label" for="productdiscountRadio2">
                                                    10% or more
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="0"
                                                    id="productdiscountRadio1">
                                                <label class="form-check-label" for="productdiscountRadio1">
                                                    Less than 10%
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end accordion-item -->

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingRating">
                                    <button class="accordion-button bg-transparent shadow-none collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#flush-collapseRating"
                                        aria-expanded="false" aria-controls="flush-collapseRating">
                                        <span class="text-muted text-uppercase fs-12 fw-medium">Rating</span> <span
                                            class="badge bg-success rounded-pill align-middle ms-1 filter-badge"></span>
                                    </button>
                                </h2>

                                <div id="flush-collapseRating" class="accordion-collapse collapse"
                                    aria-labelledby="flush-headingRating">
                                    <div class="accordion-body text-body">
                                        <div class="d-flex flex-column gap-2 filter-check" id="rating-filter">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="4"
                                                    id="productratingRadio4">
                                                <label class="form-check-label" for="productratingRadio4">
                                                    <span class="text-muted">
                                                        <i class="mdi mdi-star text-warning"></i>
                                                        <i class="mdi mdi-star text-warning"></i>
                                                        <i class="mdi mdi-star text-warning"></i>
                                                        <i class="mdi mdi-star text-warning"></i>
                                                        <i class="mdi mdi-star"></i>
                                                    </span> 4 & Above
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="3"
                                                    id="productratingRadio3">
                                                <label class="form-check-label" for="productratingRadio3">
                                                    <span class="text-muted">
                                                        <i class="mdi mdi-star text-warning"></i>
                                                        <i class="mdi mdi-star text-warning"></i>
                                                        <i class="mdi mdi-star text-warning"></i>
                                                        <i class="mdi mdi-star"></i>
                                                        <i class="mdi mdi-star"></i>
                                                    </span> 3 & Above
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="2"
                                                    id="productratingRadio2">
                                                <label class="form-check-label" for="productratingRadio2">
                                                    <span class="text-muted">
                                                        <i class="mdi mdi-star text-warning"></i>
                                                        <i class="mdi mdi-star text-warning"></i>
                                                        <i class="mdi mdi-star"></i>
                                                        <i class="mdi mdi-star"></i>
                                                        <i class="mdi mdi-star"></i>
                                                    </span> 2 & Above
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1"
                                                    id="productratingRadio1">
                                                <label class="form-check-label" for="productratingRadio1">
                                                    <span class="text-muted">
                                                        <i class="mdi mdi-star text-warning"></i>
                                                        <i class="mdi mdi-star"></i>
                                                        <i class="mdi mdi-star"></i>
                                                        <i class="mdi mdi-star"></i>
                                                        <i class="mdi mdi-star"></i>
                                                    </span> 1
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end accordion-item -->
                        </div>
                    </div>
                    <!-- end card -->
                </div>
            </div>
        </div>
        <!--end container-->
    </div>

    <section class="section bg-light bg-opacity-25"
        style="background-image: url('build/images/ecommerce/bg-effect.png');background-position: center; background-size: cover;">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-6">
                    <div>
                        <p class="fs-15 text-uppercase fw-medium"><span class="fw-semibold text-danger">25% Up to</span>
                            off all Products</p>
                        <h1 class="lh-base text-capitalize mb-3">Stay home & get your daily needs from our shop</h1>
                        <p class="fs-15 mb-4 pb-2">Start You'r Daily Shopping with <a href="#!"
                                class="link-info fw-medium">Toner</a></p>
                        <form action="#!">
                            <div class="position-relative ecommerce-subscript">
                                <input type="email" class="form-control rounded-pill" placeholder="Enter your email">
                                <button type="submit" class="btn btn-primary btn-hover rounded-pill">Subscript
                                    Now</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!--end col-->
                <div class="col-lg-4">
                    <div class="mt-4 mt-lg-0">
                        <img src="{{ URL::asset('build/images/ecommerce/subscribe.png') }}" alt="" class="img-fluid">
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--end container-->
    </section>

    <section class="position-relative py-5">
        <div class="container">
            <div class="row gy-4 gy-lg-0">
                <div class="col-lg-3 col-sm-6">
                    <div class="d-flex align-items-center gap-3">
                        <div class="flex-shrink-0">
                            <img src="{{ URL::asset('build/images/ecommerce/fast-delivery.png') }}" alt="" class="avatar-sm">
                        </div>
                        <div class="flex-grow-1">
                            <h5 class="fs-15">Fast &amp; Secure Delivery</h5>
                            <p class="text-muted mb-0">Tell about your service.</p>
                        </div>
                    </div>
                </div>
                <!--end col-->
                <div class="col-lg-3 col-sm-6">
                    <div class="d-flex align-items-center gap-3">
                        <div class="flex-shrink-0">
                            <img src="{{ URL::asset('build/images/ecommerce/returns.png') }}" alt="" class="avatar-sm">
                        </div>
                        <div class="flex-grow-1">
                            <h5 class="fs-15">2 Days Return Policy</h5>
                            <p class="text-muted mb-0">No question ask.</p>
                        </div>
                    </div>
                </div>
                <!--end col-->
                <div class="col-lg-3 col-sm-6">
                    <div class="d-flex align-items-center gap-3">
                        <div class="flex-shrink-0">
                            <img src="{{ URL::asset('build/images/ecommerce/guarantee-certificate.png') }}" alt=""
                                class="avatar-sm">
                        </div>
                        <div class="flex-grow-1">
                            <h5 class="fs-15">Money Back Guarantee</h5>
                            <p class="text-muted mb-0">Within 5 business days</p>
                        </div>
                    </div>
                </div>
                <!--end col-->
                <div class="col-lg-3 col-sm-6">
                    <div class="d-flex align-items-center gap-3">
                        <div class="flex-shrink-0">
                            <img src="{{ URL::asset('build/images/ecommerce/24-hours-support.png') }}" alt="" class="avatar-sm">
                        </div>
                        <div class="flex-grow-1">
                            <h5 class="fs-15">24 X 7 Service</h5>
                            <p class="text-muted mb-0">Online service for customer</p>
                        </div>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--end container-->
    </section>
@endsection
@section('scripts')
    <!-- nouisliderribute js -->
    <script src="{{ URL::asset('build/libs/nouislider/nouislider.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/wnumb/wNumb.min.js') }}"></script>

    <!-- Product-grid init js -->
    <script src="{{ URL::asset('build/js/frontend/product-grid.init.js') }}"></script>

    <!-- landing-index js -->
    <script src="{{ URL::asset('build/js/frontend/menu.init.js') }}"></script>
@endsection
