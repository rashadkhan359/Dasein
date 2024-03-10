<div class="card">
    <div class="card-header">
        <h6 class="card-title mb-0">Create SubCategory</h6>
    </div>
    <div class="card-body">
        <form autocomplete="off" class="needs-validation createSubCategory-form" id="createSubCategory-form"
            action="{{ route('admin.sub-category.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-xxl-12 col-lg-6">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name<span class="text-danger">*</span></label>
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
                        <label for="slug" class="form-label">Slug <span class="text-danger">*</span></label>
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
                        <div>
                            <label for="store" class="form-label">Category <span class="text-danger">*</span></label>
                            <select class="form-select choices" id="category" data-choices
                                data-choices-search-false name="category_id">
                                <option selected value="">Choose Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') === $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('category_id')
                            <span class="invalid-feedback" role="alert">
                                <small class="text-danger">{{ $message }}</small>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-xxl-12 col-lg-6">
                    <div class="mb-3">
                        <label for="image" class="form-label d-block">Image<span class="text-danger">*</span></label>
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
                        <label for="descriptionInput" class="form-label">Description</label>
                        <textarea class="form-control" id="descriptionInput" rows="3" placeholder="Description" required
                            name="description">{{ old('description') }}</textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <small class="text-danger">{{ $message }}</small>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-xxl-12">
                    <div class="text-end">
                        <button type="submit" class="btn btn-success">Add SubCategory</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
