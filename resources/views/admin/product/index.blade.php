@extends('admin.layouts.master')
@section('title')
    Product List
@endsection
@section('css')
    <!-- extra css -->
    <!-- nouisliderribute css -->
    <link rel="stylesheet" href="{{ URL::asset('build/libs/nouislider/nouislider.min.css') }}">
    <!-- gridjs css -->
    <link rel="stylesheet" href="{{ URL::asset('build/libs/gridjs/mermaid.min.css') }}">
    <link href="{{ asset('build/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
    <style>
        .active-store {
            background: aquamarine;
            border-radius: 5px;
            box-shadow: 1px 1px 3px #eee
        }

        [data-bs-theme=dark] .active-store {
            background: orange;
        }
    </style>
@endsection
@section('content')
    <x-breadcrumb title="Product List" pagetitle="Products" />
    <livewire:product.index>
@endsection
@push('scripts')
    <!-- nouisliderribute js -->
    <script src="{{ URL::asset('build/libs/nouislider/nouislider.min.js') }}"></script>
    <!-- gridjs js -->
    <script src="{{ URL::asset('build/libs/gridjs/gridjs.umd.js') }}"></script>
    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>

    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('success', (event) => {
                toastr.success(event.message);
            });

            Livewire.on('error', (event) => {
                toastr.error(event.message);
            });

            // Using event delegation for dynamic elements
            document.addEventListener('click', (event) => {
                if (event.target.closest('.delete-list-item')) {
                    const itemId = event.target.closest('.delete-list-item').dataset.itemId;

                    Swal.fire({
                        title: "Are you sure?",
                        text: "You won't be able to revert this!",
                        icon: "warning",
                        showCancelButton: true,
                        customClass: {
                            confirmButton: 'btn btn-primary w-xs me-2 mt-2',
                            cancelButton: 'btn btn-danger w-xs mt-2',
                        },
                        confirmButtonText: "Yes, delete it!",
                        buttonsStyling: false,
                        showCloseButton: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            Livewire.dispatch('deleteItem', {
                                itemId: itemId
                            });
                        }
                    });
                }
            });

            Livewire.on('itemDeleted', () => {
                // Show the "Deleted" Swal alert
                Swal.fire({
                    title: 'Deleted!',
                    text: 'The item has been deleted.',
                    icon: 'success',
                    customClass: {
                        confirmButton: 'btn btn-primary w-xs mt-2',
                    },
                    buttonsStyling: false
                });
            });
        });
    </script>
@endpush
