@extends('admin.layouts.master')
@section('title', 'Edit Slider | Website')
@section('css')
    <link rel="stylesheet" href="{{ asset('backend/build/libs/dropzone/dropzone.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />
@endsection

@section('content')
    <x-breadcrumb title="Edit Slider" pagetitle="Slider" />
    <div class="card">
        <div class="card-header">
            <h6 class="card-title mb-0">Edit {{ $sub }}</h6>
        </div>
        <div class="card-body">
            <form autocomplete="off" class="needs-validation createCategory-form" id="createCategory-form"
                action="{{ route('admin.sub-category.update', $store->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-xxl-12 col-lg-6">
                        <div class="mb-3">
                            <label for="storeTitle" class="form-label">Store Title<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="storeTitle" placeholder="Enter title"
                                value="{{ old('name') ?? $store->name }}" name="name" required>
                            <div class="invalid-feedback">Please enter a store title.</div>
                        </div>
                    </div>
                    <div class="col-xxl-12 col-lg-6">
                        <div class="mb-3">
                            <label for="slugInput" class="form-label">Slug <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="slugInput" placeholder="Enter slug"
                                name="slug" value="{{ old('slug') ?? $store->slug }}">
                        </div>
                    </div>
                    <div class="col-xxl-12 col-lg-6">
                        <div class="mb-3">
                            <div>
                                <label for="store" class="form-label">Category <span class="text-danger">*</span></label>
                                <select class="form-select choices" id="category" data-choices data-choices-search-false
                                    name="category_id">
                                    <option selected value="">Choose Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('category_id') === $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('category_id')
                                <span class="invalid-feedback" role="alert">
                                    <small class="text-danger">{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xxl-12 col-lg-6">
                        <div class="mb-3">
                            <label for="category-image-input" class="form-label d-block">Image<span
                                    class="text-danger">*</span></label>

                            <div class="position-relative d-inline-block">
                                <input type="hidden" name="image" id="image"
                                    value="{{ old('image') ?? $store->image }}">
                                @if ($store->image)
                                    <img src="{{ asset('storage/' . $store->image) }}" alt="" height="200"
                                        class="card-img-top img-fluid" id="image-thumbnail"
                                        data-base-url="{{ asset('') }}">
                                @endif
                                <div class="dropzone my-dropzone">
                                    <div class="dz-message">
                                        <div class="mb-3">
                                            <i class="display-4 text-muted ri-upload-cloud-2-fill"></i>
                                        </div>

                                        <h5>Drop file here or click to upload.</h5>
                                    </div>
                                </div>
                                <div class="error-msg mt-1">Please add a store images.</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-12 col-lg-6">
                        <div class="mb-3">
                            <label for="descriptionInput" class="form-label">Description</label>
                            <textarea class="form-control" id="descriptionInput" rows="3" placeholder="Description" required
                                name="description">{{ old('description') ?? $store->description }}</textarea>
                            <div class="invalid-feedback">Please enter a description.</div>
                        </div>
                    </div>
                    <div class="col-xxl-12">
                        <div class="text-end">
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
@push('scripts')
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
