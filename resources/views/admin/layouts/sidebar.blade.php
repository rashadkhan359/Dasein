<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="index" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ URL::asset('backend/build/images/logo-sm.png') }}" alt="" height="60">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('backend/build/images/logo-dark.png') }}" alt="" height="60">
            </span>
        </a>
        <a href="index" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ URL::asset('backend/build/images/logo-sm.png') }}" alt="" height="30">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('backend/build/images/logo-light.png') }}" alt="" height="30">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">{{ __('t-menu') }}</span></li>
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link menu-link {{ setActive(['admin.dashboard']) }}"> <i class="bi bi-speedometer2"></i> <span data-key="t-dashboard">{{ __('t-dashboard') }}</span> <span class="badge badge-pill bg-danger-subtle text-danger" data-key="t-hot">{{ __('t-hot') }}</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{ setActive(['admin.slider.*']) }}" href="#sidebarWebsite" data-bs-toggle="collapse" role="button" aria-expanded="{{ isExpanded(['admin.slider.*']) }}" aria-controls="sidebarWebsite">
                        <i class="bi bi-columns"></i> <span data-key="t-website">{{ __('t-website') }}</span>
                    </a>
                    <div class="collapse menu-dropdown {{ setShow(['admin.slider.*']) }}" id="sidebarWebsite">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('admin.slider.index') }}" class="nav-link {{ setActive(['admin.slider.*']) }}" data-key="t-slider">{{ __('t-slider') }}</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ setActive([
                        'admin.store.*',
                        // 'admin.product.*',
                        'admin.category.*',
                        'admin.sub-category.*'
                    ]) }}" href="#sidebarProducts" data-bs-toggle="collapse" role="button" aria-expanded="{{ isExpanded([
                        'admin.store.*',
                        'admin.product.*',
                        'admin.category.*',
                        'admin.sub-category.*'
                    ]) }}" aria-controls="sidebarProducts">
                        <i class="bi bi-box-seam"></i> <span data-key="t-products">{{ __('t-products') }}</span>
                    </a>
                    <div class="collapse menu-dropdown {{ setShow([
                        'admin.store.*',
                        'admin.product.*',
                        'admin.category.*',
                        'admin.sub-category.*'
                    ]) }}" id="sidebarProducts">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('admin.product.index') }}" class="nav-link {{ setActive(['admin.product.index']) }}" data-key="t-products">{{ __('t-products') }}</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.product.create') }}" class="nav-link {{ setActive(['admin.product.create']) }}" data-key="t-create-product">{{ __('t-create-product') }}</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.store.index') }}" class="nav-link {{ setActive(['admin.store.*']) }}" data-key="t-stores">{{ __('t-stores') }}</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.category.index') }}" class="nav-link {{ setActive(['admin.category.*']) }}" data-key="t-categories">{{ __('t-categories') }}</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.sub-category.index') }}" class="nav-link {{ setActive(['admin.sub-category.*']) }}" data-key="t-sub-categories">{{ __('t-sub-categories') }}</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarOrders" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarOrders">
                        <i class="bi bi-cart4"></i> <span data-key="t-orders">{{ __('t-orders') }}</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarOrders">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="orders-list-view" class="nav-link" data-key="t-list-view">{{ __('t-list-view') }}</a>
                            </li>
                            <li class="nav-item">
                                <a href="orders-overview" class="nav-link" data-key="t-overview">{{ __('t-overview') }}</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a href="calendar" class="nav-link menu-link"><i class="bi bi-calendar-week"></i> <span data-key="t-calendar">{{ __('t-calendar') }}</span> </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarSellers" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarSellers">
                        <i class="bi bi-binoculars"></i> <span data-key="t-sellers">{{ __('t-sellers') }}</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarSellers">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="sellers-list-view" class="nav-link" data-key="t-list-view">{{ __('t-list-view') }}</a>
                            </li>
                            <li class="nav-item">
                                <a href="sellers-grid-view" class="nav-link" data-key="t-grid-view">{{ __('t-grid-view') }}</a>
                            </li>
                            <li class="nav-item">
                                <a href="seller-overview" class="nav-link" data-key="t-overview">{{ __('t-overview') }}</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarInvoice" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarInvoice">
                        <i class="bi bi-archive"></i> <span data-key="t-invoice">{{ __('t-invoice') }}</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarInvoice">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="invoices-list" class="nav-link" data-key="t-list-view">{{ __('t-list-view') }}</a>
                            </li>
                            <li class="nav-item">
                                <a href="invoices-details" class="nav-link" data-key="t-overview">{{ __('t-overview') }}</a>
                            </li>
                            <li class="nav-item">
                                <a href="invoices-create" class="nav-link" data-key="t-create-invoice">{{ __('t-create-invoice') }}</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a href="users-list" class="nav-link menu-link"> <i class="bi bi-person-bounding-box"></i> <span data-key="t-users-list">{{ __('t-users-list') }}</span> </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarShipping" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarShipping">
                        <i class="bi bi-truck"></i> <span data-key="t-shipping">{{ __('t-shipping') }}</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarShipping">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="shipping-list" class="nav-link" data-key="t-shipping-list">{{ __('t-shipping-list') }}</a>
                            </li>
                            <li class="nav-item">
                                <a href="shipments" class="nav-link" data-key="t-shipments">{{ __('t-shipments') }}</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="coupons" class="nav-link menu-link"> <i class="bi bi-tag"></i> <span data-key="t-coupons">{{ __('t-coupons') }}</span> </a>
                </li>
                <li class="nav-item">
                    <a href="reviews-ratings" class="nav-link menu-link"><i class="bi bi-star"></i> <span data-key="t-reviews-ratings">{{ __('t-reviews-ratings') }}</span></a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.brand.index') }}" class="nav-link menu-link {{ setActive(['admin.brand.*']) }}"><i class="bi bi-shop"></i> <span data-key="t-brands">{{ __('t-brands') }}</span> </a>
                </li>
                <li class="nav-item">
                    <a href="statistics" class="nav-link menu-link"><i class="bi bi-pie-chart"></i> <span data-key="t-statistics">{{ __('t-statistics') }}</span> </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarLocalization" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLocalization">
                        <i class="bi bi-coin"></i> <span data-key="t-localization">{{ __('t-localization') }}</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarLocalization">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="transactions" class="nav-link" data-key="t-transactions">{{ __('t-transactions') }}</a>
                            </li>
                            <li class="nav-item">
                                <a href="currency-rates" class="nav-link" data-key="t-currency-rates">{{ __('t-currency-rates') }}</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarAccounts" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAccounts">
                        <i class="bi bi-person-circle"></i> <span data-key="t-accounts">{{ __('t-accounts') }}</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarAccounts">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="account" class="nav-link" data-key="t-my-account">{{ __('t-my-account') }}</a>
                            </li>
                            <li class="nav-item">
                                <a href="account-settings" class="nav-link" data-key="t-settings">{{ __('t-settings') }}</a>
                            </li>
                            <li class="nav-item">
                                <a href="auth-signup-basic" class="nav-link" data-key="t-sign-up">{{ __('t-sign-up') }}</a>
                            </li>
                            <li class="nav-item">
                                <a href="auth-signin-basic" class="nav-link" data-key="t-sign-in">{{ __('t-sign-in') }}</a>
                            </li>
                            <li class="nav-item">
                                <a href="auth-pass-reset-basic" class="nav-link" data-key="t-passowrd-reset">{{ __('t-passowrd-reset') }}</a>
                            </li>
                            <li class="nav-item">
                                <a href="auth-pass-change-basic" class="nav-link" data-key="t-create-password">{{ __('t-create-password') }}</a>
                            </li>
                            <li class="nav-item">
                                <a href="auth-success-msg-basic" class="nav-link" data-key="t-success-message">{{ __('t-success-message') }}</a>
                            </li>
                            <li class="nav-item">
                                <a href="auth-twostep-basic" class="nav-link" data-key="t-two-step-verify">{{ __('t-two-step-verify') }}</a>
                            </li>
                            <li class="nav-item">
                                <a href="auth-logout-basic" class="nav-link" data-key="t-logout">{{ __('t-logout') }}</a>
                            </li>
                            <li class="nav-item">
                                <a href="auth-404" class="nav-link" data-key="t-error-404">{{ __('t-error-404') }}</a>
                            </li>
                            <li class="nav-item">
                                <a href="auth-500" class="nav-link" data-key="t-error-500">{{ __('t-error-500') }}</a>
                            </li>
                            <li class="nav-item">
                                <a href="coming-soon" class="nav-link" data-key="t-coming-soon">{{ __('t-coming-soon') }}</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="/components/index" target="_blank">
                        <i class="bi bi-layers"></i> <span data-key="t-components">{{ __('t-components') }}</span> <span class="badge badge-pill bg-secondary" data-key="t-v1.0">{{ __('v1.0') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarMultilevel" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarMultilevel">
                        <i class="bi bi-share"></i> <span data-key="t-multi-level">{{ __('t-multi-level') }}</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarMultilevel">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link" data-key="t-level-1.1"> {{ __('t-level-1.1') }} </a>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarAccount" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAccount" data-key="t-level-1.2"> {{ __('t-level-1.2') }}
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarAccount">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="#" class="nav-link" data-key="t-level-2.1"> {{ __('t-level-2.1') }} </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#sidebarCrm" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarCrm" data-key="t-level-2.2"> {{ __('t-level-2.2') }}
                                            </a>
                                            <div class="collapse menu-dropdown" id="sidebarCrm">
                                                <ul class="nav nav-sm flex-column">
                                                    <li class="nav-item">
                                                        <a href="#" class="nav-link" data-key="t-level-3.1"> {{ __('t-level-3.1') }}
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="#" class="nav-link" data-key="t-level-3.2"> {{ __('t-level-3.2') }}
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>
