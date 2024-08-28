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
            <h6 class="card-title mb-0">Edit {{ $store->name }}</h6>
        </div>
        <div class="card-body">
            <form autocomplete="off" class="needs-validation createCategory-form" id="createCategory-form"
                action="{{ route('admin.store.update', $store->id) }}" method="POST">
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
    <script src="{{ URL::asset('build/libs/dropzone/dropzone-min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
    <!-- create-product -->
    {{-- <script src="{{ URL::asset('build/js/backend/create-product.init.js') }}"></script> --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Ensure Dropzone is available as a global variable
            var thumbnailArray = [];
            var uploadedFilePaths = []; // Keep track of uploaded file paths
            var myDropzone = new Dropzone("div.my-dropzone", {
                url: "{{ route('admin.image.store') }}",
                addRemoveLinks: true,
                maxFiles: 1,
                removedfile: function(file) {
                    // Remove the file from the array when removed
                    file.previewElement.remove();
                    thumbnailArray = [];
                    removeFileFromServer(file.path);
                    $('#image').val('');
                },
                sending: function(file, xhr, formData) {
                    // Append CSRF token to the request headers
                    formData.append("_token", "{{ csrf_token() }}");
                    formData.append("path", 'uploads/stores');
                },
                success: function(file, response) {
                    // Handle the successful upload, you can use response.path to get the file path
                    // console.log('File uploaded successfully:', response.path);

                    // Set the value of the input field with uploaded file path
                    $('#image').val(response.path);
                },

            });

            myDropzone.on("thumbnail", function(file, dataUrl) {
                // Handle thumbnail generation
                thumbnailArray.push(dataUrl);
            });

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
        });
    </script>
@endpush
