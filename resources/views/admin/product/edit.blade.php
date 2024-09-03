@extends('admin.layouts.master')
@section('title')
    Edit Product
@endsection
@section('css')
@endsection
@section('content')
    <x-breadcrumb title="Edit Product" pagetitle="Product" />
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p class="text-danger fw-light fs-8 m-0">*{{ $error }}</p>
        @endforeach
    @endif
    <form id="createproduct-form" action="{{ route('admin.product.update', ['product' => $product]) }}"
        class="needs-validation" method="POST">
        @csrf
        @method('PUT')
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
                                value="{{ old('name') ?? $product->name }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Product Description</label>
                            <textarea id="ckeditor-classic" name="long_description" class="@error('long_description') is-invalid @enderror">{{ old('long_description') ?? $product->long_description }}</textarea>
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
                                            <option value="{{ $store->id }}"
                                                {{ $product->store_id == $store->id ? 'selected' : '' }}>
                                                {{ $store->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('store')
                                    <div class="error-msg mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Similar setup for Category and SubCategory -->

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
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
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
                                        @foreach ($subCategories as $subCategory)
                                            <option value="{{ $subCategory->id }}"
                                                {{ $product->sub_category_id == $subCategory->id ? 'selected' : '' }}>
                                                {{ $subCategory->name }}
                                            </option>
                                        @endforeach
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
                                        value="{{ old('manufacturer') ?? $product->manufacturer }}">
                                    @error('manufacturer')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-12">
                                    <div class="form-check form-switch form-switch-warning form-switch-md">
                                        <label class="form-check-label" for="flexSwitchCheckChecked">Allow
                                            Backorder</label>
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="flexSwitchCheckChecked" @if ($product->allow_backorder) checked @endif
                                            name="allow_backorder">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card -->

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
                                name="seo_title" value="{{ old('seo_title') ?? $product->seo_title }}" required>
                            @error('seo_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="seo_description">SEO Description</label>
                            <textarea id="seo_description" name="seo_description" class="form-control" style="height:100px;"
                                placeholder="SEO Description">{{ old('seo_description') ?? $product->seo_description }}</textarea>
                            @error('seo_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
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
                                <option value="1" @if ($product->status == 1) selected @endif
                                    class="text-success">Active</option>
                                <option value="0" @if ($product->status == 0) selected @endif
                                    class="text-danger bg-danger-subtle">InActive</option>
                            </select>
                        </div>

                        <div>
                            <label for="choices-publish-visibility-input" class="form-label">Visibility</label>
                            <select class="form-select visibility" name="visibility"
                                id="choices-publish-visibility-input" data-choices data-choices-search-false>
                                <option value="1" @if ($product->visibility == 1) selected @endif>Public</option>
                                <option value="0" @if ($product->visibility == 0) selected @endif>Hidden</option>
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
                        <div class="d-flex flex-wrap mb-3">
                            @php
                                $colors = [
                                    'primary',
                                    'warning',
                                    'danger',
                                    'info',
                                    'success',
                                    'secondary',
                                    'dark',
                                    'light',
                                ];
                            @endphp
                            @forelse ($product->tags as $tag)
                                <span class="badge badge-label bg-{{ $colors[$tag->id % 7] }}">
                                    <i class="mdi mdi-circle-medium me-1"></i>{{ $tag->name }}
                                    <span class="delete-tag cursor-pointer" data-tag-id="{{ $tag->id }}"
                                        data-url="{{ route('admin.product.tag.destroy', ['product' => $product]) }}"><i
                                            class="mdi mdi-close"></i></span>
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

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Product Short Description</h5>
                    </div>
                    <div class="card-body">
                        <p class="text-muted mb-2">Add short description for product</p>
                        <textarea class="form-control" placeholder="Must enter minimum of a 100 characters" rows="3"
                            name="short_description">{{ old('short_description') ?? $product->short_description }}</textarea>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0 me-3">
                        <div class="avatar-sm">
                            <div class="avatar-title rounded-circle bg-light text-primary fs-20">
                                <i class="bi bi-box-seam"></i>
                            </div>
                        </div>
                    </div>
                    <h5 class="card-title mb-1">Product Variants</h5>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach ($product->variants as $variant)
                        <div class="col-xxl-3 col-lg-4 col-md-6">
                            <div class="card watch-product text-center border-0 card-animate overflow-hidden">
                                <div class="card-body pt-4">
                                    <div class="pt-2">
                                        @if ($variant->galleries->isNotEmpty())
                                            <img src="{{ $variant->galleries->first()->imageUrl }}"
                                                alt="{{ $product->name . '-' . $variant->id }}"
                                                class="rounded img-fluid">
                                        @else
                                            <img src="{{ asset('backend/build/images/logo-light.png') }}"
                                                alt="{{ $product->name . '-' . $variant->id }}"
                                                class="rounded img-fluid">
                                        @endif
                                        <div class="mt-4">
                                            {{-- <h6 class="fs-15 text-capitalize text-truncate"><a href="#!"
                                                        class="text-reset">Full Black Fancy Watch</a></h6> --}}
                                            <p class="mb-0 fs-16"><x-show-price :variant="$variant"></x-show-price></p>
                                        </div>
                                        <ul
                                            class="watch-widgets-menu hstack justify-content-center gap-2 list-unstyled position-absolute mb-0">
                                            <li>
                                                <a href="{{ route('admin.product-variant.edit', ['id' => $variant->id]) }}"
                                                    class="rounded"><i class="bi bi-pencil"></i></a>
                                            </li>
                                            {{-- <li>
                                                    <a href="shop-cart" class="rounded"><i class="bi bi-bag"></i></a>
                                                </li> --}}
                                            <li>
                                                <a href="product-details" class="rounded"><i class="bi bi-eye"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div><!--end col-->
                    @endforeach
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center my-5">
            <button type="submit" class="btn btn-success btn-animation ">Update</button>
        </div>
        <!-- end row -->
    </form>

@endsection
@push('scripts')
    <!-- ckeditor -->
    <script src="{{ URL::asset('build/libs/@ckeditor/ckeditor5-build-classic/ckeditor.js') }}"></script>
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

        // new Choices('#product_tags', {
        //     removeItemButton: true,
        //     delimiter: ',',
        //     editItems: true, // Allow editing existing tags
        //     maxItemCount: 15, // Optional: Set a maximum number of tags
        //     placeholder: 'Add product tags (e.g., shirt, blue, cotton)',
        // });

        $(document).ready(function() {
            const selectedStore = "{{ $product->store_id }}";
            const selectedCategory = "{{ $product->category_id }}";
            const selectedSubCategory = "{{ $product->sub_category_id }}";

            console.log('Selected Store:', selectedStore);
            console.log('Selected Category:', selectedCategory);
            console.log('Selected SubCategory:', selectedSubCategory);

            // Initialize Choices for Store dropdown
            const storeChoices = new Choices('.store', {
                searchEnabled: true,
            });

            console.log('Store Choices initialized:', storeChoices);

            // Initialize empty Choices instances for Category and SubCategory
            const categoryChoices = new Choices('.category', {
                searchEnabled: true,
                placeholder: true,
                placeholderValue: 'Select category'
            });

            const subCategoryChoices = new Choices('.sub_category', {
                searchEnabled: true,
                placeholder: true,
                placeholderValue: 'Select SubCategory'
            });

            console.log('Category Choices initialized:', categoryChoices);
            console.log('SubCategory Choices initialized:', subCategoryChoices);

            // Function to update Choices instances
            function updateChoices(choicesInstance, data, placeholder, isDisabled = false) {
                console.log('Updating Choices:', choicesInstance, 'Data:', data, 'Is Disabled:', isDisabled);

                choicesInstance.clearChoices();
                choicesInstance.setChoices(data, 'value', 'label', true);

                if (isDisabled) {
                    choicesInstance.disable();
                } else {
                    choicesInstance.enable();
                }

                // Set placeholder
                choicesInstance.setChoiceByValue('');
            }

            // Function to fetch and populate dropdown options
            function fetchDropdownOptions(url, params, choicesInstance, placeholder, callback) {
                console.log('Fetching options from:', url, 'with params:', params);

                $.ajax({
                    method: 'GET',
                    url: url,
                    data: params,
                    success: function(data) {
                        const formattedData = data.map(item => ({
                            value: String(item.id), // Convert values to string
                            label: item.name,
                        }));

                        console.log('Fetched data:', formattedData);

                        updateChoices(choicesInstance, formattedData, placeholder, false);

                        // Execute callback if provided
                        if (typeof callback === 'function') {
                            callback();
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log('Error fetching data:', error);
                    }
                });
            }

            // Set the selected values when the page loads
            if (selectedStore) {
                console.log('Setting selected store:', selectedStore);
                storeChoices.setChoiceByValue(String(selectedStore));

                // Fetch categories based on selected store
                fetchDropdownOptions("{{ route('admin.product.get-categories') }}", {
                    id: selectedStore
                }, categoryChoices, 'Select category', function() {
                    if (selectedCategory) {
                        console.log('Setting selected category:', selectedCategory);
                        categoryChoices.setChoiceByValue(String(selectedCategory));
                        // Log the selected value
                        setTimeout(() => {
                            console.log('Currently selected category:', categoryChoices.getValue(
                                true));
                        }, 500); // Wait a bit before checking the value
                    }
                });
            }

            // Fetch subcategories based on selected category
            if (selectedCategory) {
                console.log('Setting selected category to fetch subcategories:', selectedCategory);
                fetchDropdownOptions("{{ route('admin.product.get-sub-categories') }}", {
                    id: selectedCategory
                }, subCategoryChoices, 'Select SubCategory', function() {
                    if (selectedSubCategory) {
                        console.log('Setting selected subcategory:', selectedSubCategory);
                        subCategoryChoices.setChoiceByValue(String(selectedSubCategory));
                        // Log the selected value
                        setTimeout(() => {
                            console.log('Currently selected subcategory:', subCategoryChoices
                                .getValue(true));
                        }, 500); // Wait a bit before checking the value
                    }
                });
            }

            // Store change event to load categories
            $('body').on('change', '.store', function(e) {
                const storeId = $(this).val();
                console.log('Store changed, new storeId:', storeId);

                if (storeId) {
                    fetchDropdownOptions("{{ route('admin.product.get-categories') }}", {
                        id: storeId
                    }, categoryChoices, 'Select category');

                    // Disable subcategory dropdown
                    updateChoices(subCategoryChoices, [], 'Select SubCategory', true);
                } else {
                    updateChoices(categoryChoices, [], 'Select category', true);
                    updateChoices(subCategoryChoices, [], 'Select SubCategory', true);
                }
            });

            // Category change event to load subcategories
            $('body').on('change', '.category', function(e) {
                const categoryId = $(this).val();
                console.log('Category changed, new categoryId:', categoryId);

                if (categoryId) {
                    fetchDropdownOptions("{{ route('admin.product.get-sub-categories') }}", {
                        id: categoryId
                    }, subCategoryChoices, 'Select SubCategory');
                } else {
                    updateChoices(subCategoryChoices, [], 'Select SubCategory', true);
                }
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('body').on('click', '.delete-tag', function(event) {
                event.preventDefault();
                let deleteUrl = $(this).data('url');
                let tagId = $(this).data('tag-id');
                $.ajax({
                    type: 'DELETE',
                    url: deleteUrl,
                    data: {
                        tag_id: tagId,
                    },
                    success: function(data) {
                        console.log(data);
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                });
            });

            const productTagsInput = document.getElementById('product_tags');

            if (productTagsInput) {
                // Fetch existing tags from the backend
                fetch("{{ route('api.tags') }}")
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(tags => {
                        // Create Choices instance with existing tags as options
                        new Choices(productTagsInput, {
                            removeItemButton: true,
                            delimiter: ',',
                            editItems: true,
                            maxItemCount: 15,
                            placeholder: true, // placeholder should be a boolean in Choices.js
                            placeholderValue: 'Add product tags (e.g., shirt, blue, cotton)', // Corrected way to set placeholder
                            choices: tags.map(tag => ({
                                value: tag.name,
                                label: tag.name
                            })),
                            duplicateItemsAllowed: false,
                            addItemFilter: function(value) {
                                if (!value) {
                                    return false;
                                }
                                const regex = /^[a-zA-Z0-9\s]+$/;
                                return regex.test(value);
                            }
                        });
                    })
                    .catch(error => {
                        console.error('Error fetching tags:', error);
                        // Handle error (e.g., show an error message)
                        alert('Failed to load tags. Please try again later.');
                    });
            } else {
                console.error('product_tags element not found.');
            }
        });
    </script>
@endpush
