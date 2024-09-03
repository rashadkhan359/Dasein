@extends('admin.layouts.master')
@section('title', 'Edit Slider | Website')
@section('css')
    <link rel="stylesheet" href="{{ asset('backend/build/libs/dropzone/dropzone.css') }}">
@endsection

@section('content')
    <x-breadcrumb title="Edit Slider" pagetitle="Slider" />
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h5 class="card-title mb-0">Edit Slider</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.slider.update', $slider->id) }}" method="POST" class="needs-validation">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-xl-9 col-lg-8">
                        <div class="form-group mb-3">
                            <label class="form-label">Mini Title</label>
                            <input type="text" class="form-control @error('mini_title') is-invalid @enderror"
                                name="mini_title" value="{{ old('mini_title') ? old('mini_title') : $slider->mini_title }}">
                            @error('mini_title')
                                <span class="invalid-feedback" role="alert">
                                    <small class="text-danger">{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Main Title</label>
                            <input type="text" class="form-control @error('main_title') is-invalid @enderror"
                                name="main_title" value="{{ old('mini_title') ? old('mini_title') : $slider->main_title }}">
                            @error('main_title')
                                <span class="invalid-feedback" role="alert">
                                    <small class="text-danger">{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Sub Title</label>
                            <input type="text" class="form-control @error('sub_title') is-invalid @enderror"
                                name="sub_title" value="{{ old('mini_title') ? old('mini_title') : $slider->sub_title }}">
                            @error('sub_title')
                                <span class="invalid-feedback" role="alert">
                                    <small class="text-danger">{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Button URL</label>
                            <input type="url" class="form-control @error('button_url') is-invalid @enderror"
                                name="button_url" value="{{ old('mini_title') ? old('mini_title') : $slider->button_url }}">
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
                                        {{ ($slider->button_color ?? old('button_color')) === 'primary' ? 'checked' : '' }}>
                                    <label
                                        class="avatar-xs btn btn-primary p-0 d-flex align-items-center justify-content-center rounded-circle"
                                        for="button-color-1"></label>
                                </li>
                                <li>
                                    <input type="radio" name="button_color" value="secondary" id="button-color-2"
                                        {{ ($slider->button_color ?? old('button_color')) === 'secondary' ? 'checked' : '' }}>
                                    <label
                                        class="avatar-xs btn btn-secondary p-0 d-flex align-items-center justify-content-center rounded-circle"
                                        for="button-color-2"></label>
                                </li>
                                <li>
                                    <input type="radio" name="button_color" value="success" id="button-color-3"
                                        {{ ($slider->button_color ?? old('button_color')) === 'success' ? 'checked' : '' }}>
                                    <label
                                        class="avatar-xs btn btn-success p-0 d-flex align-items-center justify-content-center rounded-circle"
                                        for="button-color-3"></label>
                                </li>
                                <li>
                                    <input type="radio" name="button_color" value="danger" id="button-color-4"
                                        {{ ($slider->button_color ?? old('button_color')) === 'danger' ? 'checked' : '' }}>
                                    <label
                                        class="avatar-xs btn btn-danger p-0 d-flex align-items-center justify-content-center rounded-circle"
                                        for="button-color-4"></label>
                                </li>
                                <li>
                                    <input type="radio" name="button_color" value="info" id="button-color-5"
                                        {{ ($slider->button_color ?? old('button_color')) === 'info' ? 'checked' : '' }}>
                                    <label
                                        class="avatar-xs btn btn-info p-0 d-flex align-items-center justify-content-center rounded-circle"
                                        for="button-color-5"></label>
                                </li>
                                <li>
                                    <input type="radio" name="button_color" value="warning" id="button-color-6"
                                        {{ ($slider->button_color ?? old('button_color')) === 'warning' ? 'checked' : '' }}>
                                    <label
                                        class="avatar-xs btn btn-warning p-0 d-flex align-items-center justify-content-center rounded-circle"
                                        for="button-color-6"></label>
                                </li>
                                <li>
                                    <input type="radio" name="button_color" value="dark" id="button-color-7"
                                        {{ ($slider->button_color ?? old('button_color')) === 'dark' ? 'checked' : '' }}>
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
                                            @error('image')
                                                <span class="invalid-feedback" role="alert">
                                                    <small class="text-danger">{{ $message }}</small>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body text-center">
                                    <input type="hidden" name="image" id="image"
                                        value="{{ $slider->image }}" />
                                    @if ($slider->image)
                                        <img src="{{ $slider->image_url }}" alt=""
                                            height="200" class="card-img-top img-fluid" id="image-thumbnail"
                                            data-base-url="{{ $slider->image_url }}">
                                    @endif
                                    <div class="dropzone my-dropzone">
                                        <div class="dz-message">
                                            <div class="mb-3">
                                                <i class="display-4 text-muted ri-upload-cloud-2-fill"></i>
                                            </div>

                                            <h5>Drop file here or click to upload.</h5>
                                        </div>
                                    </div>
                                    <div class="error-msg mt-1">Please add a product images.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Ordering</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="position" class="form-label">Order</label>
                                    <select class="form-select" id="position" data-choices data-choices-search-false
                                        name="position">

                                        @php
                                            $positionValue = $slider->position ?? old('position');
                                        @endphp
                                        <option {{ !isset($positionValue) ? 'selected' : '' }} value="">Select Order</option>
                                        @for ($i = 1; $i <= $active_slider_count; $i++)
                                            <option value="{{ $i }}"
                                                {{ $positionValue == $i ? 'selected' : '' }}>
                                                {{ $i }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Publish</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="choices-publish-status-input" class="form-label">Status</label>
                                    <select class="form-select" id="choices-publish-status-input" data-choices
                                        data-choices-search-false name="status" disabled>
                                        <option selected>
                                            {{ $slider->schedule_publish ? ($slider->schedule_publish->isFuture() ? 'Scheduled' : 'Published' ) : ($slider->visibility == 1 ? 'Published' : 'Draft') }}
                                        </option>
                                    </select>
                                </div>

                                <div>
                                    <label for="choices-publish-visibility-input" class="form-label">Visibility</label>
                                    <select class="form-select" id="choices-publish-visibility-input" data-choices
                                        data-choices-search-false name="visibility">
                                        <option value="0"
                                            {{ $slider->visibility ?? old('visibility') == 0 ? 'selected' : '' }}>Hidden
                                        </option>
                                        <option value="1"
                                            {{ $slider->visibility ?? old('visibility') == 1 ? 'selected' : '' }}>
                                            Public</option>
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
                        <button type="submit" class="btn btn-secondary">Update</button>
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
    <script type='text/javascript' src='{{ asset('backend/build/libs/choices.js/choices.min.js') }}'></script>
    <script type='text/javascript' src='{{ asset('backend/build/libs/flatpickr/flatpickr.min.js') }}'></script>
    <!-- create-product -->
    {{-- <script src="{{ URL::asset('build/js/backend/create-product.init.js') }}"></script> --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get the database timestamp or old value from the Blade template
            var databaseDate = "{{ $slider->schedule_publish ? $slider->schedule_publish->toIsoString() : '' }}";
            var oldPublishDate = "{{ old('schedule_publish') ?? '' }}";

            // Combine the database timestamp and old value to prioritize the database timestamp
            var defaultDate = databaseDate || oldPublishDate || "today";

            // Initialize Flatpickr datetime picker
            flatpickr("#datepicker-publish-input", {
                minDate: "today",
                defaultDate: defaultDate, // Set the default date and time
                enableTime: true,
                dateFormat: "Y-m-d H:i:s",
                time_24hr: true
            });

            // Get the database value from Blade template
            var visibilityValue = "{{ $slider->visibility ?? old('visibility') }}";

            // Find the select element
            var selectVisibilityElement = document.getElementById('choices-publish-visibility-input');

            // Loop through the options and set the selected attribute if the option value matches the database value
            for (var i = 0; i < selectVisibilityElement.options.length; i++) {
                if (selectVisibilityElement.options[i].value == visibilityValue) {
                    selectVisibilityElement.options[i].selected = true;
                    break;
                }
            }

            // Initialize Choices dropdown
            new Choices('#choices-publish-visibility-input', {
                searchEnabled: false,
            });

            // Get the database value from Blade template
            var statusValue = "{{ $slider->status ?? old('status') }}";

            // Find the select element
            var selectStatusElement = document.getElementById('choices-publish-status-input');

            // Loop through the options and set the selected attribute if the option value matches the database value
            for (var i = 0; i < selectStatusElement.options.length; i++) {
                if (selectStatusElement.options[i].value == statusValue) {
                    selectStatusElement.options[i].selected = true;
                    break;
                }
            }

            // Initialize Choices dropdown
            new Choices('#choices-publish-status-input', {
                searchEnabled: false,
            });

            // Get the database value from Blade template
            var positionValue = "{{ $slider->position ?? old('position') }}";

            // Find the select element
            var selectPositionElement = document.getElementById('posiiton');

            // Loop through the options and set the selected attribute if the option value matches the database value
            for (var i = 0; i < selectPositionElement.options.length; i++) {
                if (selectPositionElement.options[i].value == positionValue) {
                    selectPositionElement.options[i].selected = true;
                    break;
                }
            }

            // Initialize Choices dropdown
            new Choices('#position', {
                searchEnabled: false,
            });


        });

        // Ensure Dropzone is available as a global variable here
        var thumbnailArray = [];
        var uploadedFilePaths = []; // Keep track of uploaded file paths
        var currentImage = $('#image-thumbnail').attr('src');
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
                $('#image-thumbnail').attr('src', currentImage);
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
                // Construct the full asset URL for the image
                var assetUrl = $('#image-thumbnail').data('base-url') + 'storage/' + response.path;

                // Set the src attribute for the image-thumbnail with the full asset URL
                $('#image-thumbnail').attr('src', assetUrl);
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
