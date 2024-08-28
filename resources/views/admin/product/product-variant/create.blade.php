@extends('admin.layouts.master')
@section('title')
    Create product
@endsection
@section('css')
    <!-- extra css -->
    <link rel="stylesheet" href="{{ URL::asset('build/libs/@simonwep/classic.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/build/libs/dropzone/dropzone.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />
@endsection
@section('content')
    <x-breadcrumb title="Create Variant" pagetitle="Product" />
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p class="text-danger fs-5">{{ $error }}</p>
        @endforeach
    @endif
    <form id="createproduct-form" action="{{ route('admin.product-variant.store') }}" class="needs-validation"
        method="POST">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product_id }}">
        <div class="row">
            <div class="col-xl-9 col-lg-8">
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
                                <h5 class="card-title mb-1">Product Gallery</h5>
                                <p class="text-muted mb-0">Add product gallery images.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <input type="hidden" name="images" id="images" value="{{ old('images') }}">

                        @foreach (explode(',', old('images')) as $image)
                            <img src="{{ asset('storage/' . $image) }}" alt="" height="50"
                                class="card-img-top img-fluid" id="image-thumbnail"
                                data-base-url="{{ asset('storage/' . $image) }}">
                        @endforeach

                        <div class="dropzone my-dropzone text-center">
                            <div class="dz-message">
                                <div class="mb-3">
                                    <i class="display-4 text-muted ri-upload-cloud-2-fill"></i>
                                </div>

                                <h5>Drop files here or click to upload.</h5>
                            </div>
                        </div>
                        <div class="error-msg mt-1">Please add a product images.</div>
                    </div>
                </div>
                <!-- end card -->


                <div class="col-xl-9 col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar-sm">
                                        <div class="avatar-title rounded-circle bg-light text-primary fs-20">
                                            <i class="bi bi-box-seam"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="card-title mb-1">Product Attributes</h5>
                                    <p class="text-muted mb-0">Add attributes by clicking the plus button.</p>
                                </div>
                                <div class="">
                                    <button id="add-row-btn" class="btn btn-sm btn-info rounded-pill">
                                        <i class="bi bi-plus-circle align-middle rounded-pill fs-16 me-1"></i>Add
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="container">
                                <!-- Attribute rows will be added here -->
                            </div>
                        </div>
                    </div>

                    <!-- Modal for adding custom attribute -->
                    <div class="modal fade" id="addAttributeModal" tabindex="-1" aria-labelledby="addAttributeModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addAttributeModalLabel">Add Custom Attribute</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="text" id="customAttributeInput" class="form-control" placeholder="Enter custom attribute name">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" id="saveCustomAttribute">Add</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar-sm">
                                        <div class="avatar-title rounded-circle bg-light text-primary fs-20">
                                            <i class="bi bi-currency-rupee"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="card-title mb-1">Price Information</h5>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 col-sm-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="stock">Stock</label>
                                        <div class="input-group has-validation mb-3">
                                            <span class="input-group-text" id="product-stock-addon"><i class="bi bi-box"></i></span>
                                            <input type="text"
                                                class="form-control @error('stock_qty') is-invalid @enderror"
                                                id="stock" placeholder="Enter stocks"
                                                value="{{ old('stock_qty') }}" aria-label="stock_qty"
                                                aria-describedby="stock_qty" name="stock_qty">
                                            @error('stock_qty')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="price">Price</label>
                                        <div class="input-group has-validation mb-3">
                                            <span class="input-group-text" id="product-price-addon"><i class="bi bi-currency-rupee"></i></span>
                                            <input type="text"
                                                class="form-control @error('price') is-invalid @enderror"
                                                id="price" placeholder="Enter price"
                                                value="{{ old('price') }}" aria-label="price"
                                                aria-describedby="price" name="price">
                                            @error('price')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="product-discount-input">Offer Price</label>
                                        <div class="input-group has-validation mb-3">
                                            <span class="input-group-text" id="product-price-addon"><i class="bi bi-currency-rupee"></i></span>
                                            <input type="text"
                                                class="form-control @error('offer_price') is-invalid @enderror"
                                                id="offer_price" placeholder="Enter offer price"
                                                value="{{ old('offer_price') }}" aria-label="offer_price"
                                                aria-describedby="product-discount-addon" name="offer_price">
                                            @error('offer_price')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="offer_start_date">Offer Start Date</label>
                                        <div class="input-group has-validation mb-3">
                                            <span class="input-group-text" id="product-price-addon"><i
                                                    class="bi bi-calendar-date"></i></span>
                                            <input type="date"
                                                class="form-control @error('offer_start_date') is-invalid @enderror"
                                                id="offer_start_date" placeholder="Enter offer price"
                                                aria-label="offer_start_date" aria-describedby="product-discount-addon"
                                                name="offer_start_date" value="{{ old('offer_start_date') }}">
                                            @error('offer_start_date')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="offer_end_date">Offer End Date</label>
                                        <div class="input-group has-validation mb-3">
                                            <span class="input-group-text" id="product-price-addon"><i
                                                    class="bi bi-calendar-date"></i></span>
                                            <input type="date"
                                                class="form-control @error('offer_end_date') is-invalid @enderror"
                                                id="offer_end_date" placeholder="Enter offer price" aria-label="offer_price"
                                                aria-describedby="product-discount-addon" name="offer_end_date"
                                                value="{{ old('offer_end_date') }}">
                                            @error('offer_end_date')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card -->

            </div>
            <!-- end col -->

            <div class="col-xl-3 col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Publish</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="choices-publish-status-input" class="form-label">Status</label>
                            <select class="form-select" id="choices-publish-status-input" data-choices
                                data-choices-search-false name="status">
                                <option value="1" selected>Active</option>
                                <option value="0">InActive</option>
                            </select>
                        </div>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Product Tags</h5>
                    </div>
                    <div class="card-body">
                        <div class="hstack gap-3 align-items-start">
                            <div class="flex-grow-1">
                                <input class="form-control" data-choices data-choices-multiple-remove="true"
                                    placeholder="Enter tags" type="text" value="{{ old('tags') }}" id="product_tags"
                                    name="tags">
                            </div>
                        </div>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->
        </div>
        <div class="d-flex justify-content-center my-5">
            <button type="submit" class="btn btn-success btn-animation ">Add Variant</button>
        </div>
        <!-- end row -->
    </form>
@endsection
@push('scripts')
    <!-- dropzone js -->
    <script src="{{ URL::asset('build/libs/dropzone/dropzone-min.js') }}"></script>
    <script type='text/javascript' src='{{ asset('backend/build/libs/flatpickr/flatpickr.min.js') }}'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get the database timestamp or old value from the Blade template
            var oldOfferStartDate = "{{ old('offer_start_date') ?? 'today' }}";
            var oldOfferEndDate = "{{ old('offer_end_date') ?? 'today' }}";

            // Initialize Flatpickr datetime picker
            flatpickr("#offer_start_date", {
                minDate: "today",
                defaultDate: oldOfferStartDate, // Set the default date and time
                time_24hr: true
            });

            // Initialize Flatpickr datetime picker
            flatpickr("#offer_end_date", {
                minDate: "today",
                defaultDate: oldOfferEndDate, // Set the default date and time
                time_24hr: true
            });

            // Function to fetch and populate dropdown options
            function fetchDropdownOptions(url, params, selector, placeholder) {
                $.ajax({
                    method: 'GET',
                    url: url,
                    data: params,
                    success: function(data) {
                        // Populate the dropdown with new options
                        updateChoices(selector, data.map(item => ({
                            value: item.id,
                            label: item.name,
                        })), placeholder, false);
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                });
            }
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
                uploadMultiple: false,
                maxFilesize: 20,
                createImageThumbnails: true,
                maxThumbnailFilesize: 0.2,
                thumbnailWidth: 120,
                thumbnailHeight: 120,
                acceptedFiles: ".jpeg,.jpg,.png,.gif,.webp",

                removedfile: function(file) {
                    /// Remove the file from the array when removed
                    var index = uploadedFilePaths.indexOf(file.path);
                    if (index !== -1) {
                        uploadedFilePaths.splice(index, 1);
                    }
                    file.previewElement.remove();
                    thumbnailArray = [];
                    removeFileFromServer(JSON.parse(file.xhr.response).path.replace(/\\/g, '/'));

                },
                sending: function(file, xhr, formData) {
                    // Append CSRF token to the request headers
                    formData.append("_token", "{{ csrf_token() }}");
                    formData.append("path", 'uploads/products');
                },
                success: function(file, response) {
                    // Handle the successful upload, you can use response.path to get the file path
                    console.log('File uploaded successfully:', response.path);

                    uploadedFilePaths.push(response.path);

                    // Update the hidden input field with the new paths as a comma-separated string
                    $('#images').val(uploadedFilePaths.join(','));

                    console.log($('#images').val());
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
            console.log(url);
            // Make an AJAX request to delete the file
            $.ajax({
                url: "{{ route('admin.image.delete') }}",
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}",
                },
                data: {
                    _method: 'DELETE',
                    file_path: url,
                },
                success: function(response) {
                    console.log(response.message);
                },
                error: function(error) {
                    console.error('Error removing file:', error.responseText);
                }
            });
        }

        const container = document.getElementById('container');
        const addRowBtn = document.getElementById('add-row-btn');
        const saveCustomAttributeBtn = document.getElementById('saveCustomAttribute');
        const customAttributeInput = document.getElementById('customAttributeInput');
        const addAttributeModal = new bootstrap.Modal(document.getElementById('addAttributeModal'));

        let attributes = ['Size', 'Color', 'Material']; // Initial preset attributes

        addRowBtn.addEventListener('click', function(event) {
            event.preventDefault();
            addRow();
        });

        saveCustomAttributeBtn.addEventListener('click', function() {
            const newAttribute = customAttributeInput.value.trim();
            if (newAttribute && !attributes.includes(newAttribute)) {
                attributes.push(newAttribute);
                addAttributeModal.hide();
                addRow(newAttribute);
                customAttributeInput.value = '';
            }
        });

        function addRow(selectedAttribute = '') {
            const newRow = document.createElement('div');
            newRow.classList.add('row', 'mb-3');
            newRow.innerHTML = `
            <div class="col-11 px-0">
                <div class="row">
                    <div class="col-lg-6 col-sm-12 mb-2 align-items-center">
                        <div class="form-group">
                            <select name="attribute[]" class="form-select attribute-select">
                                <option value="">Select Attribute</option>
                                ${attributes.map(attr => `<option value="${attr}" ${selectedAttribute === attr ? 'selected' : ''}>${attr}</option>`).join('')}
                                <option value="custom">Add Custom Attribute</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12 mb-2 align-items-center">
                        <div class="form-group">
                            <input type="text" name="value[]" placeholder="Value" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-1 align-items-center d-flex justify-content-center">
                <button class="btn btn-sm btn-danger rounded-pill delete-row">
                    <i class="bi bi-trash"></i>
                </button>
            </div>
        `;

            const select = newRow.querySelector('.attribute-select');
            select.addEventListener('change', function() {
                if (this.value === 'custom') {
                    addAttributeModal.show();
                    this.value = ''; // Reset to empty after opening modal
                }
            });

            const deleteBtn = newRow.querySelector('.delete-row');
            deleteBtn.addEventListener('click', function() {
                newRow.remove();
            });

            container.appendChild(newRow);
        }

        // Add initial row
        addRow();

        function deleteRow(btn) {
            var row = btn.parentNode.parentNode;
            row.parentNode.removeChild(row);
        }
    </script>

    <!-- App js -->
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endpush
