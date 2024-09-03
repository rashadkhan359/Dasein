@extends('admin.layouts.master')
@section('title')
    Create product
@endsection
@section('css')
    <!-- extra css -->
    <link rel="stylesheet" href="{{ URL::asset('build/libs/@simonwep/classic.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/build/libs/dropzone/dropzone.css') }}">
@endsection
@section('content')
    <x-breadcrumb title="Create product" pagetitle="Product" />
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p class="text-danger fs-5">{{ $error }}</p>
        @endforeach
    @endif
    <form id="createproduct-form" action="{{ route('admin.product.store') }}" class="needs-validation" method="POST">
        @csrf
        <div class="row">
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
                                <h5 class="card-title mb-1">Product Information</h5>
                                <p class="text-muted mb-0">Fill all information below.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="product-title-input">Product Title</label>
                            <input type="text"
                                class="form-control @error('name')
                            is-invalid
                            @enderror"
                                id="product-title-input" placeholder="Enter product title" name="name"
                                value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Product Description</label>
                            <textarea id="ckeditor-classic" name="long_description" class="@error('long_description') is-invalid @enderror">{{ old('long_description') }}</textarea>
                            @error('long_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-xxl-6 col-sm-12 mb-3">
                                <div class="d-flex align-items-start">
                                    <div class="flex-grow-1">
                                        <label class="form-label">Store</label>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <a href="{{ route('admin.store.index') }}"
                                            class="float-end text-decoration-underline">Add New</a>
                                    </div>
                                </div>
                                <div>
                                    <select class="form-select store @error('store') is-invalid @enderror" id="store"
                                        name="store">
                                        <option value="">Select store</option>
                                        @foreach ($stores as $store)
                                            <option value="{{ $store->id }}">{{ $store->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('store')
                                    <div class="error-msg mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-xxl-6 col-sm-12 mb-3">
                                <div class="d-flex align-items-start">
                                    <div class="flex-grow-1">
                                        <label class="form-label">Category</label>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <a href="{{ route('admin.category.index') }}"
                                            class="float-end text-decoration-underline">Add New</a>
                                    </div>
                                </div>
                                <div>
                                    <select class="form-select category @error('category') is-invalid @enderror"
                                        id="category" name="category">
                                        <option value="">Select category</option>
                                    </select>
                                </div>
                                @error('category')
                                    <div class="error-msg mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-xxl-6 col-sm-12 mb-3">
                                <div class="d-flex align-items-start">
                                    <div class="flex-grow-1">
                                        <label class="form-label">SubCategory</label>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <a href="{{ route('admin.sub-category.index') }}"
                                            class="float-end text-decoration-underline">Add New</a>
                                    </div>
                                </div>
                                <div>
                                    <select class="form-select sub_category @error('sub_category') is-invalid @enderror"
                                        id="sub_category" name="sub_category">
                                        <option value="">Select SubCategory</option>
                                    </select>
                                </div>
                                @error('sub_category')
                                    <div class="error-msg mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-xxl-6 col-sm-12 mb-3">
                                <div class="d-flex align-items-start">
                                    <div class="flex-grow-1">
                                        <label class="form-label">Brand</label>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <a href="{{ route('admin.brand.create') }}"
                                            class="float-end text-decoration-underline">Add New</a>
                                    </div>
                                </div>
                                <div>
                                    <select class="form-select brand @error('brand') is-invalid @enderror" id="brand"
                                        name="brand">
                                        <option value="">Select Brand</option>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('brand')
                                    <div class="error-msg mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-xxl-6 col-sm-12 mb-3">
                                <div class="mb-3">
                                    <label class="form-label" for="manufacturer">Manufacturer</label>
                                    <input type="text" class="form-control @error('manufacturer') is-invalid @enderror"
                                        id="manufacturer" name="manufacturer" placeholder="Enter manufacturer name"
                                        value="{{ old('manufacturer') }}">
                                    @error('manufacturer')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-12">
                                    <div class="form-check form-switch form-switch-info">
                                        <label class="form-check-label" for="flexSwitchCheckChecked">Allow
                                            Backorder</label>
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="flexSwitchCheckChecked" checked name="allow_backorder">
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                    <h5 class="card-title mb-1">Product SEO</h5>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label" for="seo_title">SEO Title</label>
                                <input type="text" class="form-control" id="seo_title" placeholder="Enter SEO title"
                                    name="seo_title" value="{{ old('seo_title') }}" required>
                                @error('seo_title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="seo_description">SEO Description</label>
                                <textarea id="seo_description" name="seo_description" class="form-control" placeholder="SEO Description">{{ old('seo_description') }}</textarea>
                                @error('seo_description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-9 col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar-sm">
                                        <div class="avatar-title rounded-circle bg-light text-primary fs-20">
                                            <i class="bi bi-list-ul"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="card-title mb-1">Variant Information</h5>
                                    <p class="text-muted mb-0">Fill all information below.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 col-sm-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="stocks">Stocks</label>
                                        <input type="number"
                                            class="form-control @error('stock_qty') is-invalid @enderror" id="stocks"
                                            placeholder="Stocks" name="stock_qty" value="{{ old('stock_qty') }}">
                                        @error('stock_qty')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="product-price-input">Price</label>
                                        <div class="input-group has-validation mb-3">
                                            <span class="input-group-text" id="product-price-addon"><i
                                                    class="bi bi-currency-rupee"></i></span>
                                            <input type="text"
                                                class="form-control @error('price') is-invalid @enderror"
                                                id="product-price-input" name="price" placeholder="Enter price"
                                                value="{{ old('price') }}" aria-label="Price"
                                                aria-describedby="product-price-addon">
                                            @error('price')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->
                            <div class="row">
                                <div class="col-lg-4 col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="product-discount-input">Offer Price</label>
                                        <div class="input-group has-validation mb-3">
                                            <span class="input-group-text" id="product-price-addon"><i
                                                    class="bi bi-currency-rupee"></i></span>
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
                                <div class="col-lg-4 col-sm-6">
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
                                <div class="col-lg-4 col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="offer_end_date">Offer End Date</label>
                                        <div class="input-group has-validation mb-3">
                                            <span class="input-group-text" id="product-price-addon"><i
                                                    class="bi bi-calendar-date"></i></span>
                                            <input type="date"
                                                class="form-control @error('offer_end_date') is-invalid @enderror"
                                                id="offer_end_date" placeholder="Enter offer price"
                                                aria-label="offer_price" aria-describedby="product-discount-addon"
                                                name="offer_end_date" value="{{ old('offer_end_date') }}">
                                            @error('offer_end_date')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
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
                    <div class="modal fade" id="addAttributeModal" tabindex="-1"
                        aria-labelledby="addAttributeModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addAttributeModalLabel">Add Custom Attribute</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="text" id="customAttributeInput" class="form-control"
                                        placeholder="Enter custom attribute name">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
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
                                <img src="{{ asset('storage/' . $image) }}" alt="" height="200"
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

                        <div>
                            <label for="choices-publish-visibility-input" class="form-label">Visibility</label>
                            <select class="form-select visibility" name="visibility"
                                id="choices-publish-visibility-input" data-choices data-choices-search-false>
                                <option value="1">Public</option>
                                <option value="0" selected>Hidden</option>
                            </select>
                        </div>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->

                {{-- <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Publish Schedule</h5>
                    </div>
                    <!-- end card body -->
                    <div class="card-body">
                        <div>
                            <label for="datepicker-publish-input" class="form-label">Publish Date & Time</label>
                            <input type="text" id="datepicker-publish-input" class="form-control"
                                placeholder="Enter publish date" data-provider="flatpickr" data-date-format="d.m.y"
                                data-enable-time>
                        </div>
                    </div>
                </div> --}}
                <!-- end card -->


                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Product Tags</h5>
                    </div>
                    <div class="card-body">
                        <div class="hstack gap-3 align-items-start">
                            <div class="flex-grow-1">
                                <input class="form-control" data-choices data-choices-multiple-remove="true"
                                    placeholder="Enter tags" type="text" value="{{ old('tags') }}"
                                    id="product_tags" name="tags">
                            </div>
                        </div>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Product Short Description</h5>
                    </div>
                    <div class="card-body">
                        <p class="text-muted mb-2">Add short description for product</p>
                        <textarea class="form-control" placeholder="Must enter minimum of a 100 characters" rows="3"
                            name="short_description">{{ old('short_description') }}</textarea>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->

            </div>
            <!-- end col -->
        </div>
        <div class="d-flex justify-content-center my-5">
            <button type="submit" class="btn btn-success btn-animation ">Add Product</button>
        </div>
        <!-- end row -->
    </form>
@endsection
@push('scripts')
    <!-- ckeditor -->
    <script src="{{ URL::asset('build/libs/@ckeditor/ckeditor5-build-classic/ckeditor.js') }}"></script>
    <!-- dropzone js -->
    <script src="{{ URL::asset('build/libs/dropzone/dropzone-min.js') }}"></script>
    <!-- create-product -->
    {{-- <script src="{{ URL::asset('build/js/backend/create-product.init.js') }}"></script> --}}
    <!-- Modern colorpicker bundle -->
    {{-- <script src="{{ URL::asset('build/libs/@simonwep/pickr.min.js') }}"></script> --}}
    <script type='text/javascript' src='{{ asset('backend/build/libs/flatpickr/flatpickr.min.js') }}'></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#ckeditor-classic'))
            .then(function(editor) {
                editor.ui.view.editable.element.style.height = '200px';
            })
            .catch(function(error) {
                console.error(error);
            });

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

            new Choices('#product_tags', {
                removeItemButton: true,
                delimiter: ',',
                editItems: true, // Allow editing existing tags
                maxItemCount: 15, // Optional: Set a maximum number of tags
                placeholder: 'Add product tags (e.g., shirt, blue, cotton)',
            });

            // Initialize Choices for Store dropdown
            new Choices('.store', {
                searchEnabled: true,
            });

            // Function to initialize or update Choices
            function updateChoices(selector, data, placeholder, isDisabled = false) {
                let choicesInstance = $(selector).data('choicesInstance');

                if (choicesInstance) {
                    choicesInstance.clearStore();
                    choicesInstance.clearChoices();
                } else {
                    choicesInstance = new Choices(selector, {
                        searchEnabled: true,
                        placeholder: true,
                        placeholderValue: placeholder,
                    });
                    $(selector).data('choicesInstance', choicesInstance);
                }

                // Add the options
                if (data.length > 0) {
                    choicesInstance.setChoices(data, 'value', 'label', true);
                }

                // Disable or enable the dropdown based on the isDisabled flag
                if (isDisabled) {
                    choicesInstance.disable();
                } else {
                    choicesInstance.enable();
                }

                // Set placeholder
                choicesInstance.setChoiceByValue('');
            }

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

            // Initial setup: disable category and subcategory
            updateChoices('.category', [], 'Select category', true);
            updateChoices('.sub_category', [], 'Select SubCategory', true);

            // Store change event to load categories
            $('body').on('change', '.store', function(e) {
                const storeId = $(this).val();

                if (storeId) {
                    // Fetch and enable category dropdown
                    fetchDropdownOptions("{{ route('admin.product.get-categories') }}", {
                        id: storeId
                    }, '.category', 'Select category');

                    // Disable subcategory dropdown
                    updateChoices('.sub_category', [], 'Select SubCategory', true);
                } else {
                    // Disable both category and subcategory dropdowns
                    updateChoices('.category', [], 'Select category', true);
                    updateChoices('.sub_category', [], 'Select SubCategory', true);
                }
            });

            // Category change event to load subcategories
            $('body').on('change', '.category', function(e) {
                const categoryId = $(this).val();

                if (categoryId) {
                    // Fetch and enable subcategory dropdown
                    fetchDropdownOptions("{{ route('admin.product.get-sub-categories') }}", {
                        id: categoryId
                    }, '.sub_category', 'Select SubCategory');
                } else {
                    // Disable subcategory dropdown
                    updateChoices('.sub_category', [], 'Select SubCategory', true);
                }
            });

            // Initialize color picker
            // var pickr = Pickr.create({
            //     el: ".classic-colorpicker",
            //     theme: "classic",
            //     default: "#405189",
            //     swatches: [
            //         "rgba(244, 67, 54, 1)",
            //         "rgba(233, 30, 99, 0.95)",
            //         "rgba(156, 39, 176, 0.9)",
            //         "rgba(103, 58, 183, 0.85)",
            //         "rgba(63, 81, 181, 0.8)",
            //         "rgba(33, 150, 243, 0.75)",
            //         "rgba(3, 169, 244, 0.7)",
            //         "rgba(0, 188, 212, 0.7)",
            //         "rgba(0, 150, 136, 0.75)",
            //         "rgba(76, 175, 80, 0.8)",
            //         "rgba(139, 195, 74, 0.85)",
            //         "rgba(205, 220, 57, 0.9)",
            //         "rgba(255, 235, 59, 0.95)",
            //         "rgba(255, 193, 7, 1)",
            //     ],
            //     components: {
            //         // Main components
            //         preview: true,
            //         opacity: true,
            //         hue: true,

            //         // Input / output Options
            //         interaction: {
            //             hex: true,
            //             rgba: true,
            //             hsva: true,
            //             input: true,
            //             clear: true,
            //             save: true,
            //         },
            //     },
            // });

            // pickr.on('save', (color, instance) => {
            //     // Get the selected color in HEX format
            //     var selectedColor = color.toHEXA().toString();

            //     // Set the value of the hidden input field with id 'color'
            //     document.getElementById('color').value = selectedColor;
            // }).on('clear', instance => {
            //     console.log('Event: "clear"', instance);
            // });
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
@endpush
