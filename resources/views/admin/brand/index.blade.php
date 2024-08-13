@extends('admin.layouts.master')
@section('title')
    Brands
@endsection
@section('css')
    <!-- extra css -->
@endsection
@section('content')
    <x-breadcrumb title="Brands" pagetitle="Dasein" />
    <div class="row align-items-center mb-4">
        <div class="col-xxl-3 col-lg-4 col-sm-9">
            <div class="search-box mb-3 mb-sm-0">
                <input type="text" class="form-control" id="searchInputList" autocomplete="off" placeholder="Search brands...">
                <i class="ri-search-line search-icon"></i>
            </div>
        </div><!--end col-->
        <div class="col-lg-auto ms-auto col-sm-3">
            <a href="{{ route('admin.brand.create') }}" class="btn btn-info w-100"><i class="bi bi-plus-circle me-1 align-middle"></i> Add Brand</a>
        </div><!--end col-->
    </div>

    <div class="row row-cols-xxl-5 row-cols-lg-4 row-cols-sm-2 row-cols-1" id="brand-list"></div>

    <div id="noresult" class="d-none">
        <div class="text-center py-4">
            <div class="avatar-md mx-auto mb-4">
                <div class="avatar-title bg-primary-subtle text-primary rounded-circle fs-24">
                    <i class="bi bi-search"></i>
                </div>
            </div>
            <h5 class="mt-2">Sorry! No Result Found</h5>
        </div>
    </div>

    <div class="row mb-4" id="pagination-element">
        <div class="col-lg-12">
            <div
                class="pagination-block pagination pagination-separated justify-content-center justify-content-sm-end mb-sm-0">
                <div class="page-item">
                    <a href="javascript:void(0);" class="page-link" id="page-prev"><i class="mdi mdi-chevron-left"></i></a>
                </div>
                <span id="page-num" class="pagination"></span>
                <div class="page-item">
                    <a href="javascript:void(0);" class="page-link" id="page-next"><i class="mdi mdi-chevron-right"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- end pagination-element -->
@endsection
@section('scripts')
    <!-- brands list -->
    <script>
        var url = "{{ url('/') }}";
    </script>
    <script src="{{ URL::asset('build/js/backend/brands-list.init.js') }}"></script>
@endsection
