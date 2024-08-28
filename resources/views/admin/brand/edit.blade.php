@extends('admin.layouts.master')
@section('title', 'Slider | Website')
@section('css')
    <link rel="stylesheet" href="{{ asset('backend/build/libs/dropzone/dropzone.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />
@endsection

@section('content')
    <x-breadcrumb title="Create Slider" pagetitle="Slider" />
    <div class="card">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-danger">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card-header d-flex justify-content-between">
            <h6 class="card-title mb-0">Create Brand</h6>
        </div>
        <div class="card-body">
            <form autocomplete="off" class="needs-validation createSubCategory-form" id="createSubCategory-form"
                action="{{ route('admin.brand.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-xxl-12 col-lg-6">
                        <div class="mb-3">
                            <label for="name" class="form-label @error('name') is-invalid @enderror">Name<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="name" placeholder="Enter title"
                                name="name" value={{ old('name') }}>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <small class="text-danger">{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xxl-12 col-lg-6">
                        <div class="mb-3">
                            <label for="slug"
                                class="form-label @error('slug')
                            is-invalid
                        @enderror">Slug<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="slug" placeholder="Enter slug"
                                name="slug" value="{{ old('slug') }}">
                            @error('slug')
                                <span class="invalid-feedback" role="alert">
                                    <small class="text-danger">{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xxl-12 col-lg-6">
                        <div class="mb-3">
                            <label for="image" class="form-label d-block @error('image') is-invalid @enderror">Image<span
                                    class="text-danger">*</span></label>
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <small class="text-danger">{{ $message }}</small>
                                </span>
                            @enderror

                            <div class="position-relative d-inline-block">
                                <input type="hidden" name="image" id="image">
                                <div class="dropzone my-dropzone">
                                    <div class="dz-message">
                                        <div class="mb-3">
                                            <i class="display-4 text-muted ri-upload-cloud-2-fill"></i>
                                        </div>

                                        <h5>Drop file here or click to upload.</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-12 col-lg-6">
                        <div class="mb-3">
                            <label for="descriptionInput"
                                class="form-label @error('description') is-invalid @enderror">Description</label>
                            <textarea class="form-control" id="descriptionInput" rows="3" placeholder="Description" required
                                name="description">{{ old('description') }}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <small class="text-danger">{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xxl-12 col-lg-6">
                        <div class="mb-3">
                            <div>
                                <label for="store" class="form-label @error('status') is-invalid @enderror">Status <span
                                        class="text-danger">*</span></label>
                                <select class="form-select choices" id="status" data-choices data-choices-search-false
                                    name="category_id">
                                    <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Yes</option>
                                    <option value="0"
                                        {{ old('status') ? (old('status') == 0 ? 'selected' : '') : 'selected' }}>No
                                    </option>
                                </select>
                            </div>
                            @error('status')
                                <span class="invalid-feedback" role="alert">
                                    <small class="text-danger">{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xxl-12 col-lg-6">
                        <div class="mb-3">
                            <div>
                                <label for="store"
                                    class="form-label @error('is_featured') is-invalid @enderror">Featured<span
                                        class="text-danger">*</span></label>
                                <select class="form-select choices" id="is_featured" data-choices data-choices-search-false
                                    name="is_featured">
                                    <option value="1" {{ old('is_featured') == 1 ? 'selected' : '' }}>Yes</option>
                                    <option value="0"
                                        {{ old('is_featured') ? (old('is_featured') == 0 ? 'selected' : '') : 'selected' }}>
                                        No</option>
                                </select>
                            </div>
                            @error('is_featured')
                                <span class="invalid-feedback" role="alert">
                                    <small class="text-danger">{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xxl-12">
                        <div class="text-end">
                            <button type="submit" class="btn btn-success">Add Brand</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('scripts')
    <!-- dropzone js -->
    <script src="{{ URL::asset('build/libs/dropzone/dropzone-min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get the database value from Blade template
            var statusValue = "{{ $brand->status ?? old('status') }}";

            // Find the select element
            var selectStatusElement = document.getElementById('status');

            // Loop through the options and set the selected attribute if the option value matches the database value
            for (var i = 0; i < selectStatusElement.options.length; i++) {
                if (selectStatusElement.options[i].value == statusValue) {
                    selectStatusElement.options[i].selected = true;
                    break;
                }
            }

            // Initialize Choices dropdown
            new Choices('#status', {
                searchEnabled: false,
            });

            // Get the database value from Blade template
            var isFeaturedValue = "{{ $brand->is_featured ?? old('is_featured') }}";

            // Find the select element
            var selectIsFeaturedElement = document.getElementById('is_featured');

            // Loop through the options and set the selected attribute if the option value matches the database value
            for (var i = 0; i < selectIsFeaturedElement.options.length; i++) {
                if (selectIsFeaturedElement.options[i].value == isFeaturedValue) {
                    selectIsFeaturedElement.options[i].selected = true;
                    break;
                }
            }

            // Initialize Choices dropdown
            new Choices('#is_featured', {
                searchEnabled: false,
            });
        });



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
                formData.append("path", 'uploads/banners');
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
    </script>
@endpush
