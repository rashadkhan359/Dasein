@extends('admin.layouts.master')
@section('title', 'Slider | Website')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <link href="{{ asset('build/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5 class="card-title mb-0">Slider</h5>
                    <a href="{{ route('admin.slider.create') }}" class="btn btn-primary btn-sm btn-label rounded-pill"><i
                            class="bi bi-plus-circle label-icon align-middle rounded-pill fs-16 me-2"></i>Create New</a>
                </div>
                <div class="card-body">
                    {{ $dataTable->table() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

    <!-- Sweet Alerts js -->
    <script src="{{ asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>

@endpush
