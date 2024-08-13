@extends('admin.layouts.master')
@section('title', 'Category | Products')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <link href="{{ asset('build/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />
    <link rel="stylesheet" href="{{ asset('backend/build/libs/dropzone/dropzone.css') }}">
    <style>
        /* Basic Rules */
        .switch input {
            display: none;
        }

        .switch {
            display: inline-block;
            width: 40px;
            height: 20px;
            margin: 8px;
            transform: translateY(50%);
            position: relative;
        }

        /* Style Wired */
        .slider {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            border-radius: 30px;
            box-shadow: 0 0 0 2px #777, 0 0 4px #777;
            cursor: pointer;
            border: 4px solid transparent;
            overflow: hidden;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            width: 100%;
            height: 100%;
            background: #777;
            border-radius: 30px;
            transform: translateX(-20px);
            transition: .4s;
        }

        input:checked+.slider:before {
            transform: translateX(20px);
            background: limeGreen;
        }

        input:checked+.slider {
            box-shadow: 0 0 0 2px limeGreen, 0 0 2px limeGreen;
        }

        /* Style Flat */
        .switch.flat .slider {
            box-shadow: none;
        }

        .switch.flat .slider:before {
            background: #FFF;
        }

        .switch.flat input:checked+.slider:before {
            background: white;
        }

        .switch.flat input:checked+.slider {
            background: limeGreen;
        }
    </style>
@endsection
@section('content')
    <x-breadcrumb title="Categories" pagetitle="Products" />
    @if($errors->any())
        {{ $errors }}
    @endif
    <div class="row">
        <div class="col-xxl-3">
            @include('admin.category.create')
        </div>
        <div class="col-xxl-9">
            <div class="row justify-content-between mb-4">
                <div class="col-xxl-3 col-lg-6">
                    <div class="search-box mb-3 mb-lg-0">
                        <input type="text" class="form-control" id="searchInputList" placeholder="Search Category...">
                        <i class="ri-search-line search-icon"></i>
                    </div>
                </div>
            </div>
            <!--end row-->

            <div class="row" id="categories-list">
                <div class="col-xxl-4 col-md-6">
                    <div class="card categrory-widgets overflow-hidden">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-3">
                                <h5 class="flex-grow-1 mb-0">Headphone</h5>
                                <ul class="flex-shrink-0 list-unstyled hstack gap-1 mb-0">
                                    <li><a href="#!" class="badge bg-info-subtle text-info">Edit</a></li>
                                    <li><a href="#deleteModal" data-bs-toggle="modal"
                                            class="badge bg-danger-subtle text-danger">Delete</a></li>
                                </ul>
                            </div>
                            <ul class="list-unstyled vstack gap-2 mb-0">
                                <li><a href="#!" class="text-muted">Wireless</a></li>
                                <li><a href="#!" class="text-muted">Gaming</a></li>
                                <li><a href="#!" class="text-muted">Circumaural (over-ear)</a></li>
                                <li><a href="#!" class="text-muted">Supra-aural (on-ear)</a></li>
                            </ul>
                            <div class="mt-3">
                                <a data-bs-toggle="offcanvas" href="#overviewOffcanvas" class="fw-medium link-effect">Read
                                    More <i class="ri-arrow-right-line align-bottom ms-1"></i></a>
                            </div>
                            <img src="{{ URL::asset('build/images/ecommerce/headphone.png') }}" alt=""
                                class="img-fluid category-img object-fit-cover">
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->

            <div class="row" id="pagination-element">
                <div class="col-lg-12">
                    <div
                        class="pagination-block pagination pagination-separated justify-content-center justify-content-sm-end mb-sm-0">
                        <div class="page-item">
                            <a href="javascript:void(0);" class="page-link" id="page-prev">←</a>
                        </div>
                        <span id="page-num" class="pagination"></span>
                        <div class="page-item">
                            <a href="javascript:void(0);" class="page-link" id="page-next">→</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end col-->
    </div>
    <!--end row-->

    <div class="offcanvas offcanvas-end" tabindex="-1" id="overviewOffcanvas" aria-labelledby="overviewOffcanvasLabel">
        <div class="offcanvas-header bg-primary-subtle">
            <h5 class="offcanvas-title" id="overviewOffcanvasLabel">#TB<span class="overview-id"></span></h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="avatar-lg mx-auto">
                <div class="avatar-title bg-light rounded">
                    <img src="{{ URL::asset('build/images/ecommerce/clothes.png') }}" alt=""
                        class="avatar-sm overview-img">
                </div>
            </div>
            <div class="text-center mt-3">
                <h5 class="overview-title">Clothing</h5>
            </div>

            <h6 class="fs-14">Description</h6>
            <p class="text-muted overview-desc">Beauty Care is basically the science of beauty treatment that involves skin
                Care, hair Care, manicure, pedicure, Anti- aging treatments, facials, styling and so on.</p>

            <h6 class="fs-14 mb-3">Sub Categories</h6>
            <ul class="vstack gap-2 mb-0 subCategory" style="list-style-type: circle;">
                <li><a href="#!" class="text-reset">Casual Wear</a></li>
                <li><a href="#!" class="text-reset">Formal Wear</a></li>
                <li><a href="#!" class="text-reset">Business Attire</a></li>
                <li><a href="#!" class="text-reset">Sportswear</a></li>
                <li><a href="#!" class="text-reset">Lingerie</a></li>
                <li><a href="#!" class="text-reset">Childrens wear</a></li>
                <li><a href="#!" class="text-reset">Cardigan</a></li>
                <li><a href="#!" class="text-reset">Tracksuit</a></li>
                <li><a href="#!" class="text-reset">Sweater</a></li>
                <li><a href="#!" class="text-reset">Dungarees</a></li>
            </ul>
        </div>
        <div class="p-3 border-top">
            <div class="row">
                <div class="col-sm-6">
                    <div data-bs-dismiss="offcanvas">
                        <button type="button" class="btn btn-danger w-100 remove-list" data-bs-toggle="modal"
                            data-bs-target="#deleteModal"><i class="ri-delete-bin-line me-1 align-bottom"></i>
                            Delete</button>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div data-bs-dismiss="offcanvas">
                        <button type="button" class="btn btn-secondary w-100 edit-list" data-bs-toggle="modal"
                            data-bs-target="#editModal">
                            <i class="ri-pencil-line me-1 align-bottom"></i> Edit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- deleteModal -->
    <div id="deleteModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true"
        style="background-color:rgba(0,0,0,0.5)">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" id="close-removecategoryModal" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body p-md-5">
                    <div class="text-center">
                        <div class="text-danger">
                            <i class="bi bi-trash display-4"></i>
                        </div>
                        <div class="mt-4 fs-15">
                            <h4 class="mb-1">Are you sure ?</h4>
                            <p class="text-muted mx-4 mb-0">Are you sure you want to remove this category?</p>
                        </div>
                    </div>
                    <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                        <button type="button" class="btn w-sm btn-light btn-hover"
                            data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn w-sm btn-danger btn-hover remove-list-keep"
                            id="remove-category-keep" data-route="{{ url('/admin/category') }}">Yes<br><span
                                style="font-size:12px;">(Keep
                                SubCategory)</span></button>
                        <button type="button" class="btn w-sm btn-danger btn-hover remove-list-delete"
                            id="remove-category-delete" data-route="{{ url('/admin/category/delete') }}">Yes<br><span
                                style="font-size:12px;">(Delete
                                SubCategory)</span></button>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- editModal -->
    <div id="editModal" class="modal flip zoomIn" tabindex="-1" aria-hidden="true"
        style="background-color:rgba(0,0,0,0.5)">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Edit Category</h4>
                    <button type="button" class="btn-close" id="close-editcategoryModal" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body p-md-5">
                    <form method="POST" class="needs-validation editCategory-form" id="editCategory-form">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-xxl-12 col-lg-6 border-top border-bottom mb-3">
                                <div>
                                        <label for="editStatus" class="form-label">Status</label>
                                        <label class="switch" for="editStatus">
                                            <input type="checkbox" id="editStatus"  name="status">
                                            <span class="slider"></span>
                                        </label>
                                        <div class="script">
                                        </div>
                                    </div>
                            </div>
                            <div class="col-xxl-12 col-lg-6">
                                <div class="mb-3">
                                    <label for="editName" class="form-label">Category Name<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="editName" name="name" placeholder="Enter Name"
                                        value="tName" name="name" placeholder="Enter Name"
                                        value="{{ old('name') }}">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <small class="text-danger">{{ $message }}</small>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xxl-12 col-lg-6">
                                <div class="mb-3">
                                    <label for="editSlug" class="form-label">Slug <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('slug') is-invalid @enderror"
                                        id="editSlug" placeholder="Enter slug" name="slug"
                                        value="{{ old('slug') }}">
                                    @error('slug')
                                        <span class="invalid-feedback" role="alert">
                                            <small class="text-danger">{{ $message }}</small>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-xxl-12 col-lg-6">
                                <div class="mb-3">
                                    <div>
                                        <label for="editStore" class="form-label">Store <span
                                                class="text-danger">*</span></label>
                                        <select class="form-select choices" id="editStore" data-choices
                                            data-choices-search-false name="store_id">
                                            <option selected value="">Choose Store</option>
                                            @foreach ($stores as $store)
                                                <option value="{{ $store->id }}">{{ $store->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('store_id')
                                        <span class="invalid-feedback" role="alert">
                                            <small class="text-danger">{{ $message }}</small>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xxl-12 col-lg-6">
                                <div class="mb-3 text-center">
                                    <label for="category-image-input" class="form-label d-block">Image <span
                                            class="text-danger">*</span></label>
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <small class="text-danger">{{ $message }}</small>
                                        </span>
                                    @enderror
                                    <input type="hidden" name="image" id="editImage" />
                                    <img src="#" alt="" height="200" class="card-img-top img-fluid"
                                        id="editImageView">

                                    <div class="position-relative d-inline-block">
                                        <div class="dropzone my-dropzone text-center">
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
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" id="editDescription" rows="3"
                                        placeholder="Description" name="description"></textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <small class="text-danger">{{ $message }}</small>
                                        </span>
                                    @enderror
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

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection

@section('scripts')
    <!-- Sweet Alerts js -->
    <script src="{{ asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
    <!-- dropzone js -->
    <script src="{{ URL::asset('build/libs/dropzone/dropzone-min.js') }}"></script>
    <script>
        var categoryListData = [
            @foreach ($categories as $category)
                {
                    'id': {{ $category->id }},
                    'categorySlug': "{{ $category->slug }}",
                    'categoryStoreID': "{{ $category->store_id }}",
                    "categoryImg": "{{ asset('storage/' . $category->image) }}",
                    "categoryImgRaw": "{{ $category->image }}",
                    "categoryTitle": "{{ $category->name }}",
                    "subCategory": {!! json_encode($category->sub_categories->pluck('name')) !!},
                    "description": "{{ $category->description }}",
                    "categoryEditRoute": "{{ route('admin.category.update', $category->id) }}",
                    "status": "{{ $category->status }}",
                },
            @endforeach
        ];

        document.addEventListener('DOMContentLoaded', function() {

            // Find the select element
            var selectStoreElement = document.getElementById('store');

            @if (old('store_id'))
                // Get the database value from Blade template
                var storeValue = "{{ old('store_id') }}";

                // Loop through the options and set the selected attribute if the option value matches the database value
                for (var i = 0; i < selectStoreElement.options.length; i++) {
                    if (selectStoreElement.options[i].value == storeValue) {
                        selectStoreElement.options[i].selected = true;
                        break;
                    }
                }
            @endif

            // Initialize Choices dropdown
            new Choices('#store', {
                searchEnabled: false,
                placeholder: true,
                placeholderValue: 'Choose Store',
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
                    formData.append("path", 'uploads/category');
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
    <script src="{{ URL::asset('build/js/backend/product-categories.init.js') }}"></script>
@endsection
