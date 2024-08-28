@extends('admin.layouts.master')
@section('title', 'Brand')
@section('css')
    <link rel="stylesheet" href="{{ asset('backend/build/libs/dropzone/dropzone.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />
@endsection

@section('content')
    <x-breadcrumb title="Create Brand" pagetitle="Brand" />
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
                    <div class="col-xxl-6 col-lg-6">
                        <div class="mb-3">
                            <label for="name" class="form-label @error('name') is-invalid @enderror">Name<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="name" placeholder="Enter name"
                                name="name" value={{ old('name') }}>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <small class="text-danger">{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xxl-6 col-lg-6">
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
                    <div class="col-xxl-6 col-lg-6">
                        <div class="mb-3">
                            <label for="image" class="form-label d-block @error('image') is-invalid @enderror">Image<span
                                    class="text-danger">*</span></label>
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <small class="text-danger">{{ $message }}</small>
                                </span>
                            @enderror
                            @if(old('image'))
                                <img src="{{ asset('storage/' . old('image')) }}" alt="" style="height: 200px;width:200px;">
                            @endif

                            <div class="position-relative d-inline-block">
                                <input type="hidden" name="image" id="image" value="{{ old('image') }}">
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
                    <div class="col-xxl-6 col-lg-6">
                        <div class="mb-3">
                            <label for="descriptionInput"
                                class="form-label @error('description') is-invalid @enderror">Description</label>
                            <textarea class="form-control" id="descriptionInput" rows="3" placeholder="Description"
                                name="description">{{ old('description') }}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <small class="text-danger">{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xxl-6 col-md-6">
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
                    <div class="col-xxl-6 col-md-6">
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
                    <div class="col-xxl-6 col-lg-6">
                        <div class="mb-3">
                            <label for="founded_at" class="form-label @error('founded_at') is-invalid @enderror">
                                Founded At</label>
                            <input type="text" class="form-control" id="founded_at" placeholder="Enter founded at"
                                name="founded_at" value="{{ old('founded_at') }}">
                            @error('founded_at')
                                <span class="invalid-feedback" role="alert">
                                    <small class="text-danger">{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xxl-6 col-lg-6">
                        <div class="mb-3">
                            <label for="mini_description" class="form-label @error('mini_description') is-invalid @enderror">
                                Mini Description
                            </label>
                            <input type="text" class="form-control" id="mini_description" placeholder="Enter short description..."
                                name="mini_description" value="{{ old('mini_description') }}">
                            @error('mini_description')
                                <span class="invalid-feedback" role="alert">
                                    <small class="text-danger">{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xxl-6 col-lg-6">
                        <div class="mb-3">
                            <label for="email"
                                class="form-label @error('email')
                            is-invalid
                        @enderror">Email</label>
                            <input type="text" class="form-control" id="email" placeholder="Enter email"
                                name="email" value="{{ old('email') }}">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <small class="text-danger">{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xxl-6 col-lg-6">
                        <div class="mb-3">
                            <label for="phone"
                                class="form-label @error('phone')
                            is-invalid
                        @enderror">Phone</label>
                            <input type="text" class="form-control" id="phone" placeholder="Enter phone"
                                name="phone" value="{{ old('phone') }}">
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <small class="text-danger">{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xxl-6 col-lg-6">
                        <div class="mb-3">
                            <label for="website"
                                class="form-label @error('website')
                            is-invalid
                        @enderror">Website</label>
                            <input type="text" class="form-control" id="website" placeholder="Enter website"
                                name="website" value="{{ old('website') }}">
                            @error('website')
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
            // Initialize Choices dropdown
            new Choices('#status', {
                searchEnabled: false,
                placeholder: true,
                placeholderValue: 'Choose Visibility',
                noChoicesText: 'No choices to choose from',
                itemSelectText: 'Press to select',
            });
            new Choices('#is_featured', {
                searchEnabled: false,
                placeholder: true,
                placeholderValue: 'Choose Visibility',
                noChoicesText: 'No choices to choose from',
                itemSelectText: 'Press to select',
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
                formData.append("path", 'uploads/brands');
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
