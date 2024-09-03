<div class="row">
    <div class="col-xl-3 col-lg-4">
        <div class="card overflow-hidden">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <h5 class="card-title mb-0">Filters</h5>
                    </div>
                    <div class="flex-shrink-0">
                        <a href="#" class="text-decoration-underline" id="clearall"
                            wire:click.prevent="clearAll">Clear All</a>
                    </div>
                </div>
            </div>

            <div class="accordion accordion-flush filter-accordion">
                <div class="card-body border-bottom">
                    <div>
                        <p class="text-muted text-uppercase fs-13 mb-3">Stores</p>
                        <ul class="list-unstyled mb-0 filter-list">
                            @foreach ($stores as $store)
                                <li>
                                    <a href="#"
                                        class="d-flex py-1 align-items-center px-2 @if ($currentStore->id == $store->id) bg-primary @endif">
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0 listname">{{ $store->name }}</h6>
                                        </div>
                                        <div class="flex-shrink-0 ms-2">
                                            <span class="badge bg-light text-muted">2</span>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="card-body border-bottom">
                    <p class="text-muted text-uppercase fs-13 m b-4">Price</p>
                    <div id="product-price-range" data-slider-color="info"></div>
                    <div class="formCost d-flex gap-2 align-items-center mt-3 justify-content-center">
                        <label for="minCost" class="form-label mb-0"><i class="bi bi-currency-rupee"></i></label>
                        <input class="form-control form-control-sm" type="text" id="minCost" autocomplete="off"
                            wire:model='minPrice'>
                        <span class="fw-semibold text-muted">to</span>
                        <label for="minCost" class="form-label mb-0"><i class="bi bi-currency-rupee"></i></label>
                        <input class="form-control form-control-sm" type="text" id="maxCost"
                            wire:model.live='maxPrice'>
                    </div>
                </div>

                @if ($categories->isNotEmpty())
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingCategory">
                            <button
                                class="accordion-button bg-transparent shadow-none @if (!$openAccordions['category']) collapsed @endif"
                                type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseCategory"
                                aria-expanded="false" aria-controls="flush-collapseCategory"
                                wire:click="$toggle('openAccordions.category')">
                                <span class="text-muted text-uppercase fs-13">Category</span>
                                <span class="badge bg-success rounded-pill align-middle ms-1 filter-badge"></span>
                            </button>
                        </h2>
                        <div id="flush-collapseCategory"
                            class="accordion-collapse @if ($openAccordions['category']) show @else collapse @endif"
                            aria-labelledby="flush-collapseCategory">
                            <div class="accordion-body text-body">
                                <div class="d-flex flex-column gap-2 filter-check" id="rating-filter">
                                    @foreach ($categories as $category)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="{{ $category->id }}"
                                                id="categoryCheckbox{{ $category->id }}"
                                                wire:model.live="selectedCategories">
                                            <label class="form-check-label" for="categoryCheckbox{{ $category->id }}">
                                                {{ $category->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endif


                {{-- <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingColors">
                        <button class="accordion-button bg-transparent shadow-none" type="button"
                            data-bs-toggle="collapse" data-bs-target="#flush-collapseColors" aria-expanded="true"
                            aria-controls="flush-collapseColors">
                            <span class="text-muted text-uppercase fs-13">Colors</span> <span
                                class="badge bg-success rounded-pill align-middle ms-1 filter-badge"></span>
                        </button>
                    </h2>

                    <div id="flush-collapseColors" class="accordion-collapse collapse show"
                        aria-labelledby="flush-headingColors">
                        <div class="accordion-body text-body pt-0">
                            <ul class="clothe-colors list-unstyled hstack gap-3 mb-0 flex-wrap" id="color-filter">
                                <li>
                                    <input type="radio" name="colors" value="success" id="color-1">
                                    <label
                                        class="avatar-xs btn btn-success p-0 d-flex align-items-center justify-content-center rounded-circle"
                                        for="color-1"></label>
                                </li>
                                <li>
                                    <input type="radio" name="colors" value="info" id="color-2">
                                    <label
                                        class="avatar-xs btn btn-info p-0 d-flex align-items-center justify-content-center rounded-circle"
                                        for="color-2"></label>
                                </li>
                                <li>
                                    <input type="radio" name="colors" value="warning" id="color-3">
                                    <label
                                        class="avatar-xs btn btn-warning p-0 d-flex align-items-center justify-content-center rounded-circle"
                                        for="color-3"></label>
                                </li>
                                <li>
                                    <input type="radio" name="colors" value="danger" id="color-4">
                                    <label
                                        class="avatar-xs btn btn-danger p-0 d-flex align-items-center justify-content-center rounded-circle"
                                        for="color-4"></label>
                                </li>
                                <li>
                                    <input type="radio" name="colors" value="primary" id="color-5">
                                    <label
                                        class="avatar-xs btn btn-primary p-0 d-flex align-items-center justify-content-center rounded-circle"
                                        for="color-5"></label>
                                </li>
                                <li>
                                    <input type="radio" name="colors" value="secondary" id="color-6">
                                    <label
                                        class="avatar-xs btn btn-secondary p-0 d-flex align-items-center justify-content-center rounded-circle"
                                        for="color-6"></label>
                                </li>
                                <li>
                                    <input type="radio" name="colors" value="dark" id="color-7">
                                    <label
                                        class="avatar-xs btn btn-dark p-0 d-flex align-items-center justify-content-center rounded-circle"
                                        for="color-7"></label>
                                </li>
                                <li>
                                    <input type="radio" name="colors" value="light" id="color-8">
                                    <label
                                        class="avatar-xs btn btn-light p-0 d-flex align-items-center justify-content-center rounded-circle"
                                        for="color-8"></label>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- end accordion-item -->

                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingSize">
                        <button class="accordion-button bg-transparent shadow-none" type="button"
                            data-bs-toggle="collapse" data-bs-target="#flush-collapseSize" aria-expanded="true"
                            aria-controls="flush-collapseSize">
                            <span class="text-muted text-uppercase fs-13">Sizes</span> <span
                                class="badge bg-success rounded-pill align-middle ms-1 filter-badge"></span>
                        </button>
                    </h2>

                    <div id="flush-collapseSize" class="accordion-collapse collapse show"
                        aria-labelledby="flush-headingSize">
                        <div class="accordion-body text-body pt-0">
                            <ul class="clothe-size list-unstyled hstack gap-3 mb-0 flex-wrap" id="size-filter">
                                <li>
                                    <input type="radio" name="sizes" value="xs" id="sizeXs">
                                    <label
                                        class="avatar-xs btn btn-soft-primary p-0 d-flex align-items-center justify-content-center rounded-circle"
                                        for="sizeXs">XS</label>
                                </li>
                                <li>
                                    <input type="radio" name="sizes" value="s" id="sizeS">
                                    <label
                                        class="avatar-xs btn btn-soft-primary p-0 d-flex align-items-center justify-content-center rounded-circle"
                                        for="sizeS">S</label>
                                </li>
                                <li>
                                    <input type="radio" name="sizes" value="m" id="sizeM">
                                    <label
                                        class="avatar-xs btn btn-soft-primary p-0 d-flex align-items-center justify-content-center rounded-circle"
                                        for="sizeM">M</label>
                                </li>
                                <li>
                                    <input type="radio" name="sizes" value="l" id="sizeL">
                                    <label
                                        class="avatar-xs btn btn-soft-primary p-0 d-flex align-items-center justify-content-center rounded-circle"
                                        for="sizeL">L</label>
                                </li>
                                <li>
                                    <input type="radio" name="sizes" value="xl" id="sizeXl">
                                    <label
                                        class="avatar-xs btn btn-soft-primary p-0 d-flex align-items-center justify-content-center rounded-circle"
                                        for="sizeXl">XL</label>
                                </li>
                                <li>
                                    <input type="radio" name="sizes" value="2xl" id="size2xl">
                                    <label
                                        class="avatar-xs btn btn-soft-primary p-0 d-flex align-items-center justify-content-center rounded-circle"
                                        for="size2xl">2XL</label>
                                </li>
                                <li>
                                    <input type="radio" name="sizes" value="3xl" id="size3xl">
                                    <label
                                        class="avatar-xs btn btn-soft-primary p-0 d-flex align-items-center justify-content-center rounded-circle"
                                        for="size3xl">3XL</label>
                                </li>
                                <li>
                                    <input type="radio" name="sizes" value="4xl" id="size4xl">
                                    <label
                                        class="avatar-xs btn btn-soft-primary p-0 d-flex align-items-center justify-content-center rounded-circle"
                                        for="size4xl">4XL</label>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- end accordion-item -->

                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingDiscount">
                        <button class="accordion-button bg-transparent shadow-none collapsed" type="button"
                            data-bs-toggle="collapse" data-bs-target="#flush-collapseDiscount" aria-expanded="true"
                            aria-controls="flush-collapseDiscount">
                            <span class="text-muted text-uppercase fs-13">Discount</span> <span
                                class="badge bg-success rounded-pill align-middle ms-1 filter-badge"></span>
                        </button>
                    </h2>
                    <div id="flush-collapseDiscount" class="accordion-collapse collapse"
                        aria-labelledby="flush-headingDiscount">
                        <div class="accordion-body text-body pt-1">
                            <div class="d-flex flex-column gap-2 filter-check" id="discount-filter">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="50"
                                        id="productdiscountRadio6">
                                    <label class="form-check-label" for="productdiscountRadio6">50% or more</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="40"
                                        id="productdiscountRadio5">
                                    <label class="form-check-label" for="productdiscountRadio5">40% or more</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="30"
                                        id="productdiscountRadio4">
                                    <label class="form-check-label" for="productdiscountRadio4">
                                        30% or more
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="20"
                                        id="productdiscountRadio3">
                                    <label class="form-check-label" for="productdiscountRadio3">
                                        20% or more
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="10"
                                        id="productdiscountRadio2">
                                    <label class="form-check-label" for="productdiscountRadio2">
                                        10% or more
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="0"
                                        id="productdiscountRadio1">
                                    <label class="form-check-label" for="productdiscountRadio1">
                                        Less than 10%
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end accordion-item -->

                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingRating">
                        <button class="accordion-button bg-transparent shadow-none collapsed" type="button"
                            data-bs-toggle="collapse" data-bs-target="#flush-collapseRating" aria-expanded="false"
                            aria-controls="flush-collapseRating">
                            <span class="text-muted text-uppercase fs-13">Rating</span> <span
                                class="badge bg-success rounded-pill align-middle ms-1 filter-badge"></span>
                        </button>
                    </h2>

                    <div id="flush-collapseRating" class="accordion-collapse collapse"
                        aria-labelledby="flush-headingRating">
                        <div class="accordion-body text-body">
                            <div class="d-flex flex-column gap-2 filter-check" id="rating-filter">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="4"
                                        id="productratingRadio4">
                                    <label class="form-check-label" for="productratingRadio4">
                                        <span class="text-muted">
                                            <i class="mdi mdi-star text-warning"></i>
                                            <i class="mdi mdi-star text-warning"></i>
                                            <i class="mdi mdi-star text-warning"></i>
                                            <i class="mdi mdi-star text-warning"></i>
                                            <i class="mdi mdi-star"></i>
                                        </span> 4 & Above
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="3"
                                        id="productratingRadio3">
                                    <label class="form-check-label" for="productratingRadio3">
                                        <span class="text-muted">
                                            <i class="mdi mdi-star text-warning"></i>
                                            <i class="mdi mdi-star text-warning"></i>
                                            <i class="mdi mdi-star text-warning"></i>
                                            <i class="mdi mdi-star"></i>
                                            <i class="mdi mdi-star"></i>
                                        </span> 3 & Above
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="2"
                                        id="productratingRadio2">
                                    <label class="form-check-label" for="productratingRadio2">
                                        <span class="text-muted">
                                            <i class="mdi mdi-star text-warning"></i>
                                            <i class="mdi mdi-star text-warning"></i>
                                            <i class="mdi mdi-star"></i>
                                            <i class="mdi mdi-star"></i>
                                            <i class="mdi mdi-star"></i>
                                        </span> 2 & Above
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1"
                                        id="productratingRadio1">
                                    <label class="form-check-label" for="productratingRadio1">
                                        <span class="text-muted">
                                            <i class="mdi mdi-star text-warning"></i>
                                            <i class="mdi mdi-star"></i>
                                            <i class="mdi mdi-star"></i>
                                            <i class="mdi mdi-star"></i>
                                            <i class="mdi mdi-star"></i>
                                        </span> 1
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <!-- end accordion-item -->
            </div>
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
    <div class="col-xl-9 col-lg-8">
        <div class="row g-4 mb-4">
            <div class="col-sm-auto">
                <div>
                    <a href="{{ route('admin.product.create') }}" class="btn btn-success" id="addproduct-btn"><i
                            class="ri-add-line align-bottom me-1"></i> Add Product</a>
                </div>
            </div>
            <div class="col-sm">
                <div class="d-flex justify-content-sm-end">
                    <div class="d-flex">
                        <button class="bg-transparent p-2 rounded border d-flex align-items-center me-2" wire:click='changeStyle'><i class="bx bxs-grid-alt fs-4 @if($showStyle === 'grid') text-primary @endif"></i></button>
                        <button class="bg-transparent p-2 rounded border d-flex align-items-center" wire:click='changeStyle'><i class="bx bx-list-ul fs-4 @if($showStyle === 'list') text-primary @endif"></i></button>
                    </div>
                    <div class="search-box ms-2">
                        <input type="text" class="form-control" autocomplete="off" id="searchProductList"
                            placeholder="Search Products..." wire:model.live.debounce.500ms='search'>
                        <i class="ri-search-line search-icon"></i>
                    </div>
                </div>
            </div>
        </div>

        @if ($showStyle === 'list')
            <div class="gridjs-border-none mb-4">
                <table class="table table-responsive table-striped">
                    <thead>
                        <th>Name</th>
                        <th>Stock</th>
                        <th>Variants</th>
                        <th>Orders</th>
                        <th>Publish</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex align-items-center justify-content-center me-3 rounded">
                                            <img src="{{ $product->image_url }}" alt="{{ $product->name }}" width="50"
                                                height="50" class="rounded">
                                        </div>
                                        <div>
                                            <div class="fw-bold"><a
                                                    href="{{ route('admin.product.show', ['product' => $product]) }}"
                                                    class="text-decoration-underline">{{ ucwords($product->name) }}</a>
                                            </div>
                                            <div class="text-muted small">{{ $product->category ? $product->category->name : `<span class="text-danger">undefined</span>` }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $product->variants ? $product->variants->sum('stock_qty') : 0 }}
                                </td>
                                <td>
                                    {{ $product->variants->count() }}
                                </td>
                                <td>{{ $product->orders }}</td>
                                <td>{{ $product->formatted_publish_date ?? $product->formatted_created_at }}</td>
                                <td>
                                    <div class="dropdown">
                                        <a href="#" class="btn btn-soft-primary rounded-pill p-1 px-2"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bi bi-three-dots"></i>
                                        </a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item text-info"
                                                href="{{ route('admin.product.edit', ['product' => $product]) }}"><i
                                                    class="bi bi-pencil me-1"></i>Edit
                                            </a>
                                            <a class="dropdown-item"
                                                href="{{ route('admin.product-variant.create', ['id' => $product->id]) }}">
                                                <i class="bi bi-plus-circle me-1"></i>Add Variant
                                            </a>
                                            <a class="dropdown-item text-danger delete-list-item"
                                                href="javascript:void(0)" data-item-id={{ $product->id }}>
                                                <i class="bi bi-trash me-1"></i>Delete
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-danger">
                                    No product found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        @else
            <div class="row">
                @forelse ($products as $product)
                    <div class="col-lg-4 col-sm-6">
                        <div class="card ecommerce-product-widgets overflow-hidden">
                            <div class="card-body">
                                <div class="bg-light rounded py-5 position-relative">
                                    <div class="dropdown action">
                                        <button class="btn btn-soft-secondary btn-sm btn-icon" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ph-dots-three-outline"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item text-info"
                                                    href="{{ route('admin.product.edit', ['product' => $product]) }}"><i
                                                        class="bi bi-pencil me-1"></i>Edit
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item"
                                                    href="{{ route('admin.product-variant.create', ['id' => $product->id]) }}">
                                                    <i class="bi bi-plus-circle me-1"></i>Add Variant
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item text-danger delete-list-item"
                                                    href="javascript:void(0)" data-item-id={{ $product->id }}>
                                                    <i class="bi bi-trash me-1"></i>Delete
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <img src="{{ $product->image_url }}" alt=""
                                        style="max-height: 150px;max-width: 100%;" class="mx-auto d-block rounded-2">
                                    <div class="avatar-xs label">
                                        <div class="avatar-title bg-danger rounded-circle fs-11">48%</div>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    {{-- <div class="mb-2 d-flex justify-content-between align-items-center">
                                        <h5 class="text-primary fs-17 mb-0">$900<span
                                                class="text-muted fs-14"><del>$1200</del></span></h5>
                                        <span>3.8 <i class="ri-star-half-fill text-warning align-middle"></i></span>
                                    </div> --}}
                                    <a href="{{ route('admin.product.show', ['product' => $product]) }}">
                                        <h6 class="fs-16 text-capitalize lh-base text-truncate mb-0">
                                            {{ ucwords($product->name) }}
                                        </h6>
                                    </a>
                                    <p class="text-muted">{{ $product->category ? $product->category->name : `<span class="text-danger">undefined</span>` }}</p>
                                    <div class="row d-none">
                                        <div class="col-6">
                                            <ul
                                                class="clothe-colors list-unstyled hstack gap-1 d-flex mb-0 flex-wrap mb-3">
                                                <li>
                                                    <input type="radio" name="color-{{ $product->id }}"
                                                        id="product-color-{{ $product->id }}">
                                                    <label
                                                        class="avatar-xxs border border-2 border-white btn btn-secondary p-0 d-flex align-items-center justify-content-center rounded-circle"
                                                        for="product-color-{{ $product->id }}"></label>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-6">
                                            <ul class="clothe-size list-unstyled hstack gap-2 d-flex mb-0 flex-wrap mb-3">
                                                <li>
                                                    <input type="radio" name="sizes-{{ $product->id }}" id="product-size-{{ $product->id }}">
                                                    <label class="avatar-xxs border border-2 border-white btn btn-soft-primary text-uppercase p-0 fs-12 d-flex align-items-center justify-content-center rounded-circle" for="product-size-{{ $product->id }}">Sm</label>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="row text-center g-0">
                                        <div class="col-4 border-end border-end-dashed">
                                            <div class="mt-3">
                                                <h5 class="fs-15 text-truncate mb-1">{{ $product->variants ? $product->variants->sum('stock_qty') : 0 }}</h5>
                                                <p class="text-muted mb-0">Stocks</p>
                                            </div>
                                        </div>
                                        <div class="col-4 border-end border-end-dashed">
                                            <div class="mt-3">
                                                <h5 class="fs-15 text-truncate mb-1">{{ $product->orders }}</h5>
                                                <p class="text-muted mb-0">Orders</p>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="mt-3">
                                                <h5 class="fs-15 text-truncate mb-1">{{ $product->formatted_publish_date ?? $product->formatted_created_at }}</h5>
                                                <p class="text-muted mb-0">Publish</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center">
                        No product found.
                    </div>
                @endforelse
            </div>
        @endif
        <div class="d-flex justify-content-start">
            {{ $products->links() }}
        </div>
    </div>
    {{-- <script>
        var slider = document.getElementById('product-price-range');
        if (slider) {
            noUiSlider.create(slider, {
                start: [{{ $this->minPrice }}, {{ $this->maxPrice }}], // Handle start position
                step: 10, // Slider moves in increments of '10'
                margin: 20, // Handles must be more than '20' apart
                connect: true, // Display a colored bar between the handles
                behaviour: 'tap-drag', // Move handle on tap, bar is draggable
                range: { // Slider can select '0' to '100'
                    'min': {{ $this->minPrice }},
                    'max': {{ $this->maxPrice }}
                },
                format: wNumb({
                    decimals: 0,
                    prefix: ''
                })
            });

            var minCostInput = document.getElementById('minCost'),
                maxCostInput = document.getElementById('maxCost');

            var filterDataAll = '';

            // When the slider value changes, update the input and span
            slider.noUiSlider.on('update', function(values, handle) {
                var productListupdatedAll = productListData;

                if (handle) {
                    maxCostInput.value = values[handle];

                } else {
                    minCostInput.value = values[handle];
                }

                var maxvalue = maxCostInput.value.substr(2);
                var minvalue = minCostInput.value.substr(2);
                filterDataAll = productListupdatedAll.filter(
                    product => parseFloat(product.price) >= minvalue && parseFloat(product.price) <= maxvalue
                );

                productList.updateConfig({
                    data: filterDataAll
                }).forceRender();
            });

            minCostInput.addEventListener('change', function() {
                slider.noUiSlider.set([null, this.value]);
            });

            maxCostInput.addEventListener('change', function() {
                slider.noUiSlider.set([null, this.value]);
            });
        }
    </script> --}}

    <!-- end col -->
</div>
<!-- end row -->
