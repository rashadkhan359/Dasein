<div class="card">
    <div class="card-header">
        <h6 class="card-title mb-0">Create Categories</h6>
    </div>
    <div class="card-body">
        <form action={{ route('admin.category.store') }} method="POST" class="needs-validation createCategory-form" id="createCategory-form">
            @csrf
            <div class="row">
                <div class="col-xxl-12 col-lg-6">
                    <div class="mb-3">
                        <label for="name" class="form-label">Category Name<span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                            placeholder="Enter name" value="{{ old('name') }}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <small class="text-danger">{{ $message }}</small>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-xxl-12 col-lg-6">
                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug"
                            placeholder="Enter slug" name="slug" value="{{ old('slug') }}">
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
                            <label for="store" class="form-label">Store <span class="text-danger">*</span></label>
                            <select class="form-select choices" id="store" data-choices
                                data-choices-search-false name="store_id">
                                <option selected value="">Choose Store</option>
                                @foreach ($stores as $store)
                                    <option value="{{ $store->id }}" {{ old('store_id') === $store->id ? 'selected' : '' }}>{{ $store->name }}</option>
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
                    <div class="mb-3">
                        <label for="category-image-input" class="form-label d-block">Image <span
                                class="text-danger">*</span></label>
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <small class="text-danger">{{ $message }}</small>
                            </span>
                        @enderror

                        <div class="position-relative d-inline-block">
                            <input type="hidden" name="image" id="image">
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
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="3"
                            placeholder="Description" name="description">{{ old('description') }}</textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <small class="text-danger">{{ $message }}</small>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-xxl-12">
                    <div class="text-end">
                        <button type="submit" class="btn btn-success">Add Category</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- end card -->
