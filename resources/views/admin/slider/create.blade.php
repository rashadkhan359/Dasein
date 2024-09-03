@extends('admin.layouts.master')
@section('title', 'Slider | Website')
@section('css')
    <link rel="stylesheet" href="{{ asset('backend/build/libs/dropzone/dropzone.css') }}">
@endsection

@section('content')
    <x-breadcrumb title="Create Slider" pagetitle="Slider" />
    <div class="card">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-danger fs-6 p-0 m-0">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card-header d-flex justify-content-between">
            <h5 class="card-title mb-0">Create Slider</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.slider.store') }}" method="POST" class="needs-validation">
                @csrf
                <div class="row">
                    <div class="col-xl-9 col-lg-8">
                        <div class="form-group mb-3">
                            <label class="form-label">Mini Title</label>
                            <input type="text" class="form-control @error('mini_title') is-invalid @enderror"
                                name="mini_title" value="{{ old('mini_title') }}">
                            @error('mini_title')
                                <span class="invalid-feedback" role="alert">
                                    <small class="text-danger">{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Main Title</label>
                            <input type="text" class="form-control @error('main_title') is-invalid @enderror"
                                name="main_title" value="{{ old('main_title') }}">
                            @error('main_title')
                                <span class="invalid-feedback" role="alert">
                                    <small class="text-danger">{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Sub Title</label>
                            <input type="text" class="form-control @error('sub_title') is-invalid @enderror"
                                name="sub_title" value="{{ old('sub_title') }}">
                            @error('sub_title')
                                <span class="invalid-feedback" role="alert">
                                    <small class="text-danger">{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Button URL</label>
                            <input type="url" class="form-control @error('button_url') is-invalid @enderror"
                                name="button_url" value="{{ old('button_url') }}">
                            @error('button_url')
                                <span class="invalid-feedback" role="alert">
                                    <small class="text-danger">{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Button Color</label>
                            @error('button_color')
                                <span class="invalid-feedback" role="alert">
                                    <small class="text-danger">{{ $message }}</small>
                                </span>
                            @enderror
                            <ul class="clothe-colors list-unstyled hstack gap-1 mb-0 flex-wrap ms-2">
                                <li>
                                    <input type="radio" name="button_color" value="primary" id="button-color-1"
                                        @if (old('button_color') == 'primary') checked @endif>
                                    <label
                                        class="avatar-xs btn btn-primary p-0 d-flex align-items-center justify-content-center rounded-circle"
                                        for="button-color-1"></label>
                                </li>
                                <li>
                                    <input type="radio" name="button_color" value="secondary" id="button-color-2"
                                        @if (old('button_color') == 'secondary') checked @endif>
                                    <label
                                        class="avatar-xs btn btn-secondary p-0 d-flex align-items-center justify-content-center rounded-circle"
                                        for="button-color-2"></label>
                                </li>
                                <li>
                                    <input type="radio" name="button_color" value="success" id="button-color-3"
                                        @if (old('button_color') == 'success') checked @endif>
                                    <label
                                        class="avatar-xs btn btn-success p-0 d-flex align-items-center justify-content-center rounded-circle"
                                        for="button-color-3"></label>
                                </li>
                                <li>
                                    <input type="radio" name="button_color" value="danger" id="button-color-4"
                                        @if (old('button_color') == 'danger') checked @endif>
                                    <label
                                        class="avatar-xs btn btn-danger p-0 d-flex align-items-center justify-content-center rounded-circle"
                                        for="button-color-4"></label>
                                </li>
                                <li>
                                    <input type="radio" name="button_color" value="info" id="button-color-5"
                                        @if (old('button_color') == 'info') checked @endif>
                                    <label
                                        class="avatar-xs btn btn-info p-0 d-flex align-items-center justify-content-center rounded-circle"
                                        for="button-color-5"></label>
                                </li>
                                <li>
                                    <input type="radio" name="button_color" value="warning" id="button-color-6"
                                        @if (old('button_color') == 'warning') checked @endif>
                                    <label
                                        class="avatar-xs btn btn-warning p-0 d-flex align-items-center justify-content-center rounded-circle"
                                        for="button-color-6"></label>
                                </li>
                                <li>
                                    <input type="radio" name="button_color" value="dark" id="button-color-7"
                                        @if (old('button_color') == 'dark') checked @endif>
                                    <label
                                        class="avatar-xs btn btn-dark p-0 d-flex align-items-center justify-content-center rounded-circle"
                                        for="button-color-7"></label>
                                </li>

                            </ul>
                        </div>

                        <div class="form-group">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 me-3">
                                            <div class="avatar-sm">
                                                <div class="avatar-title rounded-circle bg-light text-primary fs-20">
                                                    <i class="bi bi-images"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h5 class="card-title mb-1">Banner</h5>
                                            <p class="text-muted mb-0">Add banner image.</p>
                                            @error('image')
                                                <span class="invalid-feedback" role="alert">
                                                    <small class="text-danger">{{ $message }}</small>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body text-center">
                                    <input type="hidden" name="image" id="image">
                                    <div class="dropzone my-dropzone">
                                        <div class="dz-message">
                                            <div class="mb-3">
                                                <i class="display-4 text-muted ri-upload-cloud-2-fill"></i>
                                            </div>

                                            <h5>Drop file here or click to upload.</h5>
                                        </div>
                                    </div>
                                    <div class="error-msg mt-1">Please add a slider image.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4">
                        {{-- <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Ordering</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="position" class="form-label">Order</label>
                                    <select class="form-select choices" id="position" data-choices
                                        data-choices-search-false name="position">
                                        <option selected value="">Choose Order</option>
                                        @for ($i = 1; $i <= $active_slider_count; $i++)
                                            <option value="{{ $i }}"
                                                {{ old('position') === $i ? 'selected' : '' }}>
                                                {{ $i }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div> --}}

                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Publish</h5>
                            </div>
                            <div class="card-body">
                                <div>
                                    <label for="choices-publish-visibility-input" class="form-label">Visibility</label>
                                    <select class="form-select choices" id="choices-publish-visibility-input" data-choices
                                        data-choices-search-false name="visibility">
                                        <option selected value="">Choose Visibility</option>
                                        <option value="0" {{ old('visibility') === 0 ? 'selected' : '' }}>Hidden
                                        </option>
                                        <option value="1" {{ old('visibility') === 1 ? 'selected' : '' }}>Public
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->

                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Publish Schedule</h5>
                            </div>
                            <!-- end card body -->
                            <div class="card-body">
                                <div>
                                    <label for="datepicker-publish-input" class="form-label">Publish Date & Time</label>
                                    <input type="text" id="datepicker-publish-input" class="form-control"
                                        placeholder="Enter publish date" data-provider="flatpickr"
                                        data-date-format="d.m.y" name="schedule_publish" data-enable-time>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->
                    </div>
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-secondary">Submit</button>
                    </div>
                </div>


            </form>
        </div>
    </div>
@endsection
@push('scripts')
    <!-- ckeditor -->
    <script src="{{ URL::asset('build/libs/@ckeditor/ckeditor5-build-classic/ckeditor.js') }}"></script>
    <!-- dropzone js -->
    <script src="{{ URL::asset('build/libs/dropzone/dropzone-min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
    <script type='text/javascript' src='{{ asset('backend/build/libs/flatpickr/flatpickr.min.js') }}'></script>
    <!-- create-product -->
    {{-- <script src="{{ URL::asset('build/js/backend/create-product.init.js') }}"></script> --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get the database timestamp or old value from the Blade template
            var oldPublishDate = "{{ old('schedule_publish') ?? 'today' }}";

            // Initialize Flatpickr datetime picker
            flatpickr("#datepicker-publish-input", {
                minDate: "today",
                defaultDate: oldPublishDate, // Set the default date and time
                enableTime: true,
                dateFormat: "Y-m-d H:i:s",
                time_24hr: true
            });

            // Find the select element
            var selectVisibilityElement = document.getElementById('choices-publish-visibility-input');

            @if (old('visibility'))
                // Get the database value from Blade template
                var visibilityValue = "{{ old('visibility') }}";

                // Loop through the options and set the selected attribute if the option value matches the database value
                for (var i = 0; i < selectVisibilityElement.options.length; i++) {
                    if (selectVisibilityElement.options[i].value == visibilityValue) {
                        selectVisibilityElement.options[i].selected = true;
                        break;
                    }
                }
            @endif

            // Initialize Choices dropdown
            new Choices('#choices-publish-visibility-input', {
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
                console.log('Removed successfully.');
            },
            sending: function(file, xhr, formData) {
                // Append CSRF token to the request headers
                formData.append("_token", "{{ csrf_token() }}");
                formData.append("path", 'uploads/banners');
            },
            success: function(file, response) {
                // Handle the successful upload, you can use response.path to get the file path
                console.log('File uploaded successfully:', response.path);

                // Set the value of the input field with uploaded file path
                $('#image').val(response.path);
                console.log($('#image').val());
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
