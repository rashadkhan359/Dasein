<div class="row gx-lg-4 zoom-container">
    <div class="drift-zoom-pane-wrapper">
        <div class="drift-zoom-pane"></div>
    </div>
    <div class="col-xl-4 col-lg-8 mx-auto">
        <div class="row sticky-side-div">
            <div class="col-lg-12">
                <div class="alert alert-success text-center">
                    {{ $this->getProductType() }}
                </div>
            </div>
            <div class="col-lg-2">
                <div thumbsSlider class="swiper productSwiper productswiper-2 mb-3 mb-lg-0">
                    <div class="swiper-wrapper product-wrapper">
                        @foreach ($currentVariant->galleries as $gallery)
                            <div class="swiper-slide" wire:key="thumb-{{ $gallery->id }}">
                                <div class="product-thumb rounded cursor-pointer">
                                    <img src="{{ $gallery->image_url }}" alt="/" class="img-fluid">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!--end col-->
            <div class="col-lg-10">
                <div class="bg-light rounded-2 position-relative ribbon-box overflow-hidden">
                    <div class="swiper productSwiper2">
                        <div class="swiper-wrapper">
                            @foreach ($currentVariant->galleries as $gallery)
                                <div class="swiper-slide" wire:key="main-{{ $gallery->id }}">
                                    <img src="{{ $gallery->image_url }}" alt="" class="img-fluid drift-trigger"
                                        data-zoom="{{ $gallery->image_url }}">
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-button-next bg-transparent"></div>
                        <div class="swiper-button-prev bg-transparent"></div>
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
    <div class="col-xl-8">
        <div class="mt-5 mt-xl-0">
            <div class="d-flex">
                <div class="flex-grow-1">
                    <h4>{{ $product->name }}</h4>
                    <p class="text-muted fs-20">{{ $product->short_description }}</p>
                    <div class="hstack gap-3 flex-wrap">
                        <div><a href="#" class="text-primary d-block">Tony jon</a></div>
                        <div class="vr"></div>
                        <div class="text-muted">Manufacturer : <span
                                class="text-body fw-medium">{{ $product->manufacturer }}</span></div>
                        <div class="vr"></div>
                        <div class="text-muted">Published : <span
                                class="text-body fw-medium">{{ $product->formatted_publish_date ?? $product->formatted_created_at }}</span>
                        </div>
                    </div>
                </div>
                <div class="flex-shrink-0">
                    <a href="{{ route('admin.product.edit', ['product' => $product]) }}"
                        class="btn btn-soft-secondary btn-icon" data-bs-toggle="tooltip" data-bs-placement="top"
                        aria-label="Edit" data-bs-original-title="Edit"><i class="ri-pencil-fill align-bottom"></i></a>
                </div>
            </div>

            <div class="d-flex flex-wrap gap-2 align-items-center mt-3">
                <div class="text-muted fs-16">
                    <span class="mdi mdi-star text-warning"></span>
                    <span class="mdi mdi-star text-warning"></span>
                    <span class="mdi mdi-star text-warning"></span>
                    <span class="mdi mdi-star text-warning"></span>
                    <span class="mdi mdi-star text-warning"></span>
                </div>
                <div class="text-muted">( 50 Review )</div>
            </div>

            <div class="row">
                <div class="col-xl-6">
                    <div class=" mt-4">
                        <h5 class="fs-15 mb-3">Variants :</h5>
                        <div class="d-flex flex-wrap gap-2">
                            @foreach ($product->variants as $variant)
                                <div data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top"
                                    data-bs-original-title="{{ $this->getStock($variant) }}">
                                    <button type="button"
                                        class="btn p-0 d-flex align-items-center justify-content-center border rounded @if ($currentVariant->id === $variant->id) border-success border-3 @endif"
                                        wire:click='changeVariant({{ $variant->id }})'>
                                        @if ($variant->galleries->isNotEmpty())
                                            <img src="{{ $variant->galleries->first()->imageUrl }}"
                                                alt="{{ $product->name . '-' . $variant->id }}" width="100"
                                                height="100" class="rounded avatar-md">
                                        @else
                                            <img src="{{ asset('backend/build/images/logo-light.png') }}"
                                                alt="{{ $product->name . '-' . $variant->id }}" width="100"
                                                height="100" class="rounded avatar-md">
                                        @endif
                                    </button>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-lg-3 col-sm-6 g-3">
                    <div class="p-2 border border-dashed rounded text-center">
                        <p class="mb-2 text-uppercase text-muted fs-13">Price :</p>
                        <h5 class="mb-0"><x-show-price :variant="$currentVariant" /></h5>
                    </div>
                </div>
                <!-- end col -->
                <div class="col-lg-3 col-sm-6 g-3">
                    <div class="p-2 border border-dashed rounded text-center">
                        <p class="mb-2 text-uppercase text-muted fs-13">No. of Orders :</p>
                        <h5 class="mb-0">2,234</h5>
                    </div>
                </div>
                <!-- end col -->
                <div class="col-lg-3 col-sm-6 g-3">
                    <div class="p-2 border border-dashed rounded text-center">
                        <p class="mb-2 text-uppercase text-muted fs-13">Available Stocks :</p>
                        <h5 class="mb-0">{{ $this->getStock($currentVariant) }}</h5>
                    </div>
                </div>
                <!-- end col -->
                <div class="col-lg-3 col-sm-6 g-3">
                    <div class="p-2 border border-dashed rounded text-center">
                        <p class="mb-2 text-uppercase text-muted fs-13">Total Revenue :</p>
                        <h5 class="mb-0">$60,645</h5>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->

            <div class="mt-4 text-muted">
                <h5 class="fs-15">Description :</h5>
                {!! $product->long_description !!}
            </div>

            <div class="mt-3 mb-4">
                <h5 class="fs-15 mb-3">Services :</h5>

                <div class="row">
                    <div class="col-lg-4">
                        <div class="d-flex align-items-center gap-2">
                            <div class="avatar-xs">
                                <div class="avatar-title bg-danger-subtle text-danger fs-15 rounded">
                                    <i class="bi bi-recycle"></i>
                                </div>
                            </div>
                            <h6 class="mb-0">10 Days Replacement</h6>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="d-flex align-items-center gap-2">
                            <div class="avatar-xs">
                                <div class="avatar-title bg-success-subtle text-success fs-15 rounded">
                                    <i class="bi bi-cash-coin"></i>
                                </div>
                            </div>
                            <h6 class="mb-0">Cash on Delivery available</h6>
                        </div>
                    </div>
                </div>
            </div>

            <h5 class="fs-15">Product Details:</h5>
            <div class="table-responsive">
                <table class="table table-sm table-borderless align-middle description-table">
                    @foreach ($currentVariant->attributes as $attribute)
                        <tr>
                            <th>{{ $attribute->attribute_name }}</th>
                            <td>{{ $attribute->attribute_value }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>

            {{-- <div>
                    <div class="d-flex flex-wrap gap-4 justify-content-between align-items-center mt-4">
                        <div class="flex-shrink-0">
                            <h5 class="fs-15 mb-3 fw-medium">Total Rating's</h5>
                            <h2 class="fw-bold mb-3">10.14k</h2>
                            <p class="text-muted mb-0">Growth in reviews on this year</p>
                        </div>
                        <hr class="vr">
                        <div class="flex-shrink-0">
                            <h5 class="fs-15 mb-3 fw-medium">Average Rating</h5>
                            <h2 class="fw-bold mb-3">5.6 <span class="fs-16 align-middle text-warning ms-2">
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-half-fill"></i>
                                </span></h2>
                            <p class="text-muted mb-0">Average rating on this year</p>
                        </div>
                        <hr class="vr">
                        <div class="flex-shrink-0 w-xl">
                            <div class="row align-items-center g-3 align-items-center mb-2">
                                <div class="col-auto">
                                    <div>
                                        <h6 class="mb-0 text-muted fs-13"><i
                                                class="ri-star-fill text-warning me-1 align-bottom"></i>5</h6>
                                    </div>
                                </div>
                                <div class="col">
                                    <div>
                                        <div class="progress animated-progress progress-sm">
                                            <div class="progress-bar bg-primary" role="progressbar"
                                                style="width: 50.16%" aria-valuenow="50.16" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div>
                                        <h6 class="mb-0 text-muted fs-13">2758</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="row align-items-center g-3 mb-2">
                                <div class="col-auto">
                                    <div>
                                        <h6 class="mb-0 text-muted fs-13"><i
                                                class="ri-star-fill text-warning me-1 align-bottom"></i>4</h6>
                                    </div>
                                </div>
                                <div class="col">
                                    <div>
                                        <div class="progress animated-progress progress-sm">
                                            <div class="progress-bar bg-success" role="progressbar"
                                                style="width: 29.32%" aria-valuenow="29.32" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div>
                                        <h6 class="mb-0 text-muted fs-13">1063</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="row align-items-center g-3 mb-2">
                                <div class="col-auto">
                                    <div>
                                        <h6 class="mb-0 text-muted fs-13"><i
                                                class="ri-star-fill text-warning me-1 align-bottom"></i>3</h6>
                                    </div>
                                </div>
                                <div class="col">
                                    <div>
                                        <div class="progress animated-progress progress-sm">
                                            <div class="progress-bar bg-info" role="progressbar"
                                                style="width: 18.12%" aria-valuenow="18.12" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div>
                                        <h6 class="mb-0 text-muted fs-13">997</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="row align-items-center g-3 mb-2">
                                <div class="col-auto">
                                    <div>
                                        <h6 class="mb-0 text-muted fs-13"><i
                                                class="ri-star-fill text-warning me-1 align-bottom"></i>2</h6>
                                    </div>
                                </div>
                                <div class="col">
                                    <div>
                                        <div class="progress animated-progress progress-sm">
                                            <div class="progress-bar bg-secondary" role="progressbar"
                                                style="width: 4.98%" aria-valuenow="4.98" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div>
                                        <h6 class="mb-0 text-muted fs-13">227</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="row align-items-center g-3">
                                <div class="col-auto">
                                    <div>
                                        <h6 class="mb-0 text-muted fs-13"><i
                                                class="ri-star-fill text-warning me-1 align-bottom"></i>2</h6>
                                    </div>
                                </div>
                                <div class="col">
                                    <div>
                                        <div class="progress animated-progress progress-sm">
                                            <div class="progress-bar bg-danger" role="progressbar"
                                                style="width: 7.42%" aria-valuenow="7.42" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div>
                                        <h6 class="mb-0 text-muted fs-13">408</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4" data-simplebar="init" style="max-height: 350px">
                        <div class="simplebar-wrapper" style="margin: 0px;">
                            <div class="simplebar-height-auto-observer-wrapper">
                                <div class="simplebar-height-auto-observer"></div>
                            </div>
                            <div class="simplebar-mask">
                                <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                    <div class="simplebar-content-wrapper" tabindex="0" role="region"
                                        aria-label="scrollable content"
                                        style="height: auto; overflow: hidden scroll;">
                                        <div class="simplebar-content" style="padding: 0px;">
                                            <div class="d-flex p-3 border-bottom border-bottom-dashed">
                                                <div class="flex-shrink-0 me-3">
                                                    <img class="avatar-xs rounded-circle"
                                                        src="{{ URL::asset('build/images/users/avatar-5.jpg') }}"
                                                        alt="">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <div class="d-flex mb-3">
                                                        <div class="flex-grow-1">
                                                            <div>
                                                                <div class="mb-2 fs-12">
                                                                    <span> <i
                                                                            class="ri-star-fill text-warning align-bottom"></i></span>
                                                                    <span> <i
                                                                            class="ri-star-fill text-warning align-bottom"></i></span>
                                                                    <span> <i
                                                                            class="ri-star-fill text-warning align-bottom"></i></span>
                                                                    <span> <i
                                                                            class="ri-star-line text-warning align-bottom"></i></span>
                                                                    <span> <i
                                                                            class="ri-star-line text-warning align-bottom"></i></span>
                                                                </div>
                                                                <h6 class="mb-0">Donald Risher</h6>
                                                            </div>
                                                        </div>
                                                        <div class="flex-shrink-0">
                                                            <p class="mb-0 text-muted"><i
                                                                    class="ri-calendar-event-fill me-2 align-middle"></i>Oct
                                                                28, 2023</p>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <h5 class="lh-base fs-17">Design Quality</h5>
                                                        <p class="mb-0">
                                                            " This is an incredible framework worth so much in the right
                                                            hands! Nowhere else are you going to get so much flexibility
                                                            and
                                                            great code for a few dollars. Highly recommend purchasing
                                                            today!
                                                            Like right now! "
                                                        </p>
                                                    </div>
                                                    <div class="d-flex mt-4">
                                                        <div class="flex-shrink-0 me-3">
                                                            <img class="avatar-xs rounded-circle"
                                                                src="{{ URL::asset('build/images/users/avatar-1.jpg') }}"
                                                                alt="">
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <div class="d-flex mb-3">
                                                                <div class="flex-grow-1">
                                                                    <div>
                                                                        <h6 class="mb-2">Jansh Brown</h6>
                                                                        <p class="mb-0 text-muted fs-14">Admin</p>
                                                                    </div>
                                                                </div>
                                                                <div class="flex-shrink-0">
                                                                    <p class="mb-0 text-muted"><i
                                                                            class="ri-calendar-event-fill me-2 align-middle"></i>Feb
                                                                        04, 2023</p>
                                                                </div>
                                                            </div>
                                                            <p class="mb-0">
                                                                Thank You
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex p-3 border-bottom border-bottom-dashed">
                                                <div class="flex-shrink-0 me-3">
                                                    <img class="avatar-xs rounded-circle"
                                                        src="{{ URL::asset('build/images/users/avatar-3.jpg') }}"
                                                        alt="">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <div class="d-flex mb-3">
                                                        <div class="flex-grow-1">
                                                            <div>
                                                                <div class="mb-2 fs-12">
                                                                    <span> <i
                                                                            class="ri-star-fill text-warning align-bottom"></i></span>
                                                                    <span> <i
                                                                            class="ri-star-fill text-warning align-bottom"></i></span>
                                                                    <span> <i
                                                                            class="ri-star-fill text-warning align-bottom"></i></span>
                                                                    <span> <i
                                                                            class="ri-star-fill text-warning align-bottom"></i></span>
                                                                    <span> <i
                                                                            class="ri-star-fill text-warning align-bottom"></i></span>
                                                                </div>
                                                                <h6 class="mb-0">Richard Smith</h6>
                                                            </div>
                                                        </div>
                                                        <div class="flex-shrink-0">
                                                            <p class="mb-0 text-muted"><i
                                                                    class="ri-calendar-event-fill me-2 align-middle"></i>Dec
                                                                10, 2022</p>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <h5 class="lh-base fs-17">Feature Availability</h5>
                                                        <p class="mb-0">
                                                            " Hello everyone, I would like to suggest here two contents
                                                            that
                                                            you could create. Course pages and blog pages. In them you
                                                            could
                                                            insert the listing and management of courses and listing and
                                                            management of blog. The theme is perfect, one of the best
                                                            purchases I've ever made. "
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex p-3">
                                                <div class="flex-shrink-0 me-3">
                                                    <img class="avatar-xs rounded-circle"
                                                        src="{{ URL::asset('build/images/users/avatar-8.jpg') }}"
                                                        alt="">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <div class="d-flex mb-3">
                                                        <div class="flex-grow-1">
                                                            <div>
                                                                <div class="mb-2 fs-12">
                                                                    <span> <i
                                                                            class="ri-star-fill text-warning align-bottom"></i></span>
                                                                    <span> <i
                                                                            class="ri-star-fill text-warning align-bottom"></i></span>
                                                                    <span> <i
                                                                            class="ri-star-fill text-warning align-bottom"></i></span>
                                                                    <span> <i
                                                                            class="ri-star-half-fill text-warning align-bottom"></i></span>
                                                                    <span> <i
                                                                            class="ri-star-line text-warning align-bottom"></i></span>
                                                                </div>
                                                                <h6 class="mb-0">Pauline Moll</h6>
                                                            </div>
                                                        </div>
                                                        <div class="flex-shrink-0">
                                                            <p class="mb-0 text-muted"><i
                                                                    class="ri-calendar-event-fill me-2 align-middle"></i>Jan
                                                                28, 2023</p>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <h5 class="lh-base fs-17">Design Quality</h5>
                                                        <p class="mb-0">
                                                            "We have used your other templates as well and seems it's
                                                            amazing with the design and code quality. Wish you best for
                                                            the
                                                            future updates. Keep updated you will be #1 in near future.
                                                            "
                                                        </p>
                                                    </div>
                                                    <div class="d-flex mt-4">
                                                        <div class="flex-shrink-0 me-3">
                                                            <img class="avatar-xs rounded-circle"
                                                                src="{{ URL::asset('build/images/users/avatar-1.jpg') }}"
                                                                alt="">
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <div class="d-flex mb-3">
                                                                <div class="flex-grow-1">
                                                                    <div>
                                                                        <h6 class="mb-2">Jansh Brown</h6>
                                                                        <p class="mb-0 text-muted fs-14">Admin</p>
                                                                    </div>
                                                                </div>
                                                                <div class="flex-shrink-0">
                                                                    <p class="mb-0 text-muted"><i
                                                                            class="ri-calendar-event-fill me-2 align-middle"></i>Aug
                                                                        16, 2022</p>
                                                                </div>
                                                            </div>
                                                            <p class="mb-0">
                                                                Thank You
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="simplebar-placeholder" style="width: auto; height: 719px;"></div>
                        </div>
                        <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                            <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                        </div>
                        <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                            <div class="simplebar-scrollbar"
                                style="height: 170px; display: block; transform: translate3d(0px, 0px, 0px);"></div>
                        </div>
                    </div>
                    <div class="card p-4">
                        <h5 class="fs-18 mb-3">Add a Review</h5>
                        <div>
                            <form action="#" class="form">
                                <div class="d-flex align-items-center mb-3">
                                    <h6 class="fs-14 mb-0">Your rating:</h6>
                                    <div class="ms-3">
                                        <span class="fs-14"> <i
                                                class="ri-star-fill text-warning align-bottom"></i></span>
                                        <span class="fs-14"> <i
                                                class="ri-star-fill text-warning align-bottom"></i></span>
                                        <span class="fs-14"> <i
                                                class="ri-star-fill text-warning align-bottom"></i></span>
                                        <span class="fs-14"> <i
                                                class="ri-star-fill text-warning align-bottom"></i></span>
                                        <span class="fs-14"> <i
                                                class="ri-star-half-fill text-warning align-bottom"></i></span>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <input class="form-control" name="your-name" placeholder="Title" type="text">
                                </div>
                                <div class="mb-3">
                                    <textarea class="form-control" name="your-commemt" placeholder="Enter your comments &amp; reviews" rows="4"></textarea>
                                </div>
                                <div class="text-end">
                                    <button class="btn btn-primary btn-hover" type="submit" value="Submit">Send
                                        Review
                                        <i class="ri-send-plane-2-line align-bottom ms-1"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> --}}

        </div>
    </div>
    {{-- <div class="drift-zoom-pane"></div> --}}
</div>
