@extends('admin.layouts.master')
@section('title', 'SubCategory | Products')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <link href="{{ asset('build/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />
    <link rel="stylesheet" href="{{ asset('backend/build/libs/dropzone/dropzone.css') }}">
@endsection
@section('content')
    <x-breadcrumb title="SubCategories" pagetitle="Products" />

    <div class="row">
        <div class="col-xxl-3">
            @include('admin.sub-category.create', ['categories' => $categories])
            <!-- end card -->
        </div>
        <div class="col-xxl-9">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5 class="card-title mb-0">SubCategory</h5>
                </div>
                <div class="card-body">
                    {{ $dataTable->table() }}
                </div>
            </div>
        </div>
        <!--end col-->
    </div>
    <!--end row-->
@endsection
@push('scripts')
    <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

    <!-- Sweet Alerts js -->
    <script src="{{ asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <!-- dropzone js -->
    <script src="{{ URL::asset('build/libs/dropzone/dropzone-min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // Find the select element
            var selectCategoryElement = document.getElementById('category');

            @if (old('category_id'))
                // Get the database value from Blade template
                var categoryValue = "{{ old('category_id') }}";

                // Loop through the options and set the selected attribute if the option value matches the database value
                for (var i = 0; i < selectCategoryElement.options.length; i++) {
                    if (selectCategoryElement.options[i].value == categoryValue) {
                        selectCategoryElement.options[i].selected = true;
                        break;
                    }
                }
            @endif

            // Initialize Choices dropdown
            new Choices('#category', {
                searchEnabled: false,
                placeholder: true,
                placeholderValue: 'Choose Category',
                noChoicesText: 'No choices to choose from',
                itemSelectText: 'Press to select',
            });
        });

        // Ensure Dropzone is available as a global variable
        var thumbnailArray = [];
        var uploadedFilePaths = []; // Keep track of uploaded file paths

        // Select all elements with the class 'my-dropzone' and initialize Dropzone for each
        var dropzoneElements = document.querySelectorAll("div.my-dropzone");
        dropzoneElements.forEach(function(dropzoneElement) {
            var myDropzone = new Dropzone(dropzoneElement, {
                url: "{{ route('admin.image.store') }}",
                addRemoveLinks: true,
                maxFiles: 1,
                removedfile: function(file) {
                    // Remove the file from the array when removed
                    file.previewElement.remove();
                    thumbnailArray = [];
                    removeFileFromServer(file.path);
                    $('#image').val('');
                    $('#editImage').val('');
                },
                sending: function(file, xhr, formData) {
                    // Append CSRF token to the request headers
                    formData.append("_token", "{{ csrf_token() }}");
                    formData.append("path", 'uploads/sub-category');
                },
                success: function(file, response) {
                    // Handle the successful upload, you can use response.path to get the file path
                    // console.log('File uploaded successfully:', response.path);

                    // Set the value of the input field with uploaded file path
                    $('#image').val(response.path);
                    $('#editImage').val(response.path);
                },

            });

            myDropzone.on("thumbnail", function(file, dataUrl) {
                // Handle thumbnail generation
                thumbnailArray.push(dataUrl);
            });

        });

        // myDropzone.on("thumbnail", function(file, dataUrl) {
        //     // Handle thumbnail generation
        //     thumbnailArray.push(dataUrl);
        // });

        function removeFileFromServer(url) {
            // Make an AJAX request to delete the file
            $.ajax({
                url: "{{ route('admin.image.delete') }}",
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}",
                },
                data: {
                    file_path: url,
                },
                success: function(response) {
                    // console.log('File removed from server:', response.message);
                },
                error: function(error) {
                    console.error('Error removing file:', error.responseText);
                }
            });
        }
    </script>
@endpush
