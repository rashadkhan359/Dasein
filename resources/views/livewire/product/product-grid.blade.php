<div class="col-lg-4 col-sm-6">
    <div class="card ecommerce-product-widgets overflow-hidden">
        <div class="card-body">
            <div class="bg-light rounded py-5 position-relative">
                <div class="dropdown action">
                    <button class="btn btn-soft-secondary btn-sm btn-icon" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="ph-dots-three-outline"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Edit</a></li>
                        <li><a class="dropdown-item" href="#">Remove</a></li>
                    </ul>
                </div>
                <img src="'+ datas[i].productImg + '" alt="" style="max-height: 150px;max-width: 100%;" class="mx-auto d-block rounded-2">
                + discountElem +
            </div>
            <div class="mt-3">
                <div class="mb-2 d-flex justify-content-between align-items-center">
                + afterDiscountElem +
                    <span>'+ datas[i].rating + ' <i class="ri-star-half-fill text-warning align-middle"></i></span>
                </div>
                <a href="#!">
                    <h6 class="fs-16 text-capitalize lh-base text-truncate mb-0">'+ datas[i].productTitle + '</h6>
                </a>
                <p class="text-muted">'+ datas[i].category + '</p>
                <div class="row d-none">
                    <div class="col-6">'+ colorElem + '</div>
                    <div class="col-6">'+ sizeElem + '</div>
                </div>
                <div class="row text-center g-0">
                    <div class="col-4 border-end border-end-dashed">
                        <div class="mt-3">
                            <h5 class="fs-15 text-truncate mb-1">'+ datas[i].stock + '</h5>
                            <p class="text-muted mb-0">Stocks</p>
                        </div>
                    </div>
                    <div class="col-4 border-end border-end-dashed">
                        <div class="mt-3">
                            <h5 class="fs-15 text-truncate mb-1">'+ datas[i].orders + '</h5>
                            <p class="text-muted mb-0">Orders</p>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="mt-3">
                            <h5 class="fs-15 text-truncate mb-1">'+ datas[i].publish + '</h5>
                            <p class="text-muted mb-0">Publish</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
