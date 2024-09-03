@extends('admin.layouts.master')
@section('title', 'Edit Product Variant')
@section('css')
    <!-- extra css -->
    <link rel="stylesheet" href="{{ URL::asset('build/libs/@simonwep/classic.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/build/libs/dropzone/dropzone.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />
    <style>
        .btn-hover:hover {
            text-decoration: underline !important;
        }
    </style>
@endsection
@section('content')
    <x-breadcrumb title="Edit Product Variant" pagetitle="Product" />
    <div class="row">
        <form action="{{ route('admin.product-variant.update', ['id' => $variant->id]) }}">
            <div class="col-xl-6 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 me-3">
                                <div class="avatar-sm">
                                    <div class="avatar-title rounded-circle bg-light text-primary fs-20">
                                        <i class="bi bi-list-ul"></i>
                                    </div>
                                </div>
                            </div>
                            <h5 class="card-title mb-1">Price Information</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label" for="stocks">Stocks</label>
                                    <input type="number" class="form-control @error('stock_qty') is-invalid @enderror"
                                        id="stocks" placeholder="Stocks" name="stock_qty"
                                        value="{{ old('stock_qty') ?? $variant->stock_qty }}">
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
                                        <input type="text" class="form-control @error('price') is-invalid @enderror"
                                            id="product-price-input" name="price" placeholder="Enter price"
                                            value="{{ old('price') ?? $variant->price }}" aria-label="Price"
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
                                        <input type="text" class="form-control @error('offer_price') is-invalid @enderror"
                                            id="offer_price" placeholder="Enter offer price"
                                            value="{{ old('offer_price') ?? $variant->offer_price }}" aria-label="offer_price"
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
                                            id="offer_start_date" placeholder="Enter offer price" aria-label="offer_start_date"
                                            aria-describedby="product-discount-addon" name="offer_start_date"
                                            value="{{ old('offer_start_date') ?? $variant->offer_start_date }}">
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
                                        <input type="date" class="form-control @error('offer_end_date') is-invalid @enderror"
                                            id="offer_end_date" placeholder="Enter offer price" aria-label="offer_price"
                                            aria-describedby="product-discount-addon" name="offer_end_date"
                                            value="{{ old('offer_end_date') ?? $variant->offer_end_date }}">
                                        @error('offer_end_date')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->
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
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Product Tags</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @forelse ($product->tags as $tag)
                            <span class="badge badge-label bg-primary">
                                <i class="mdi mdi-circle-medium me-1"></i>{{ $tag->name }}
                                <form action="{{ route('admin.product-variant.tag.destroy', ['product' => $product]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="tag_id" value="{{ $tag->id }}">
                                    <button class="btn bg-transparent m-0 p-0"><i class="mdi mdi-close"></i></button>
                                </form>
                            </span>
                            @empty
                                <p>No tags added.</p>
                            @endforelse
                        </div>
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
                <!-- Modal for adding custom attribute -->
                <div class="modal fade" id="addAttributeModal" tabindex="-1" aria-labelledby="addAttributeModalLabel"
                    aria-hidden="true">
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
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="saveCustomAttribute">Add</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Existing Gallery</h5>
                    </div>
                    <div class="card-body">
                        <div class="row gap-1">
                            @foreach ($variant->galleries as $gallery)
                                <div class="card col-sm-11 col-lg-5">
                                    <img class="card-img-top img-fluid object-fit-contain" src="{{ $gallery->image_url }}"
                                        alt="Card image cap" style="height:200px;">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <form
                                                action="{{ route('admin.product.make-primary', ['id' => $variant->product_id]) }}"
                                                id="make-primary-{{ $gallery->id }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="path" id="path-{{ $gallery->id }}"
                                                    value="{{ $gallery->image_path }}">
                                                <button type="submit" class="text-info btn-hover btn p-0">
                                                    <i class="bx bx-image-add me-1"></i>Make Primary
                                                </button>
                                            </form>
                                            <form action="{{ route('admin.product-variant.image.delete') }}"
                                                id="gallery-{{ $gallery->id }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="file_path" id="file-{{ $gallery->id }}"
                                                    value="{{ $gallery->image_path }}">
                                                <input type="hidden" name="id" id="variant-{{ $gallery->id }}"
                                                    value="{{ $gallery->id }}">
                                                <button type="submit" class="text-danger btn-hover btn p-0">
                                                    <i class="bx bx-trash me-1"></i>Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="col-xl-6 col-md-12">
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
        </div>
    </div>
    @php
    $offerStart = old('offer_start_date') ? old('offer_start_date') : $product->offer_start_date ?? 'today';
    $offerEnd = old('offer_end_date') ? old('offer_end_date') : $product->offer_end_date ?? 'today';
@endphp
@endsection
@push('scripts')
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

            new Choices('#product_tags', {
                removeItemButton: true,
                delimiter: ',',
                editItems: true, // Allow editing existing tags
                maxItemCount: 15, // Optional: Set a maximum number of tags
                placeholder: 'Add product tags (e.g., shirt, blue, cotton)',
            });
        });
        // Assuming you have a way to get the existing attributes from the server
        // For this example, we'll use a dummy data structure
        const existingAttributes = [
            @foreach ($variant->attributes as $attribute)
                {
                    attribute: "{{ $attribute->attribute_name }}",
                    value: "{{ $attribute->attribute_value }}"
                },
            @endforeach
        ];

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

        function addRow(selectedAttribute = '', value = '') {
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
                                <input type="text" name="value[]" placeholder="Value" class="form-control" value="${value}">
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

        // Function to load existing attributes
        function loadExistingAttributes() {
            existingAttributes.forEach(attr => {
                addRow(attr.attribute, attr.value);
            });
        }

        // Load existing attributes when the page loads
        document.addEventListener('DOMContentLoaded', loadExistingAttributes);

        function deleteRow(btn) {
            var row = btn.parentNode.parentNode;
            row.parentNode.removeChild(row);
        }
    </script>
@endpush
