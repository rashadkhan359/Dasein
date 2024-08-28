@extends('admin.layouts.master')
@section('title')
    Product Overview
@endsection
@section('css')
    <!-- extra css -->
    <link href="{{ asset('backend/build/libs/swiper/swiper-bundle.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/drift-zoom@1.5.1/dist/drift-basic.min.css">
    <script src="https://cdn.jsdelivr.net/npm/drift-zoom@1.5.1/dist/Drift.min.js"></script>
    <style>
        .zoom-container {
            position: relative;
        }

        .drift-zoom-pane {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            z-index: 1000;
            background-color: rgba(0,0,0,0.3);
            display: none;
        }

        .drift-trigger {
            cursor: zoom-in;
        }
    </style>
@endsection
@section('content')
    <x-breadcrumb title="Overview" pagetitle="Product" />
    <livewire:product.show :id="$id">
        <!-- end row -->
    @endsection
    @push('scripts')
        <!--Swiper slider js-->
        <script src="{{ asset('backend/build/libs/swiper/swiper-bundle.min.js') }}"></script>

        {{-- <script src="{{ asset('build/js/backend/product-details.init.js') }}"></script> --}}
        <script>
            function initializeZoom() {
                const driftTriggers = document.querySelectorAll('.drift-trigger');
                const zoomPane = document.querySelector('.drift-zoom-pane');
                driftTriggers.forEach((trigger, index) => {
                    new Drift(trigger, {
                        paneContainer: zoomPane,
                        inlinePane: false,
                        showWhitespaceAtEdges: true,
                        containInline: false,
                        hoverBoundingBox: false,
                        zoomFactor: 3,
                        sourceAttribute: 'data-zoom',
                        touchDelay: 500,
                        onShow: function() {
                zoomPane.style.display = 'block';
            },
            onHide: function() {
                zoomPane.style.display = 'none';
            }
                    });
                });

                console.log('Zoom initialized');
            }

            function initializeSwiper() {
                var swiper = new Swiper(".productSwiper", {
                    spaceBetween: 10,
                    slidesPerView: 4,
                    mousewheel: true,
                    freeMode: true,
                    watchSlidesProgress: true,
                    breakpoints: {
                        992: {
                            slidesPerView: 4,
                            spaceBetween: 10,
                            direction: "vertical",
                        },
                    },
                });
                var swiper2 = new Swiper(".productSwiper2", {
                    loop: true,
                    spaceBetween: 10,
                    navigation: {
                        nextEl: ".swiper-button-next",
                        prevEl: ".swiper-button-prev",
                    },
                    thumbs: {
                        swiper: swiper,
                    },
                });

                initializeZoom();
            }

            // Initialize Swiper on page load
            document.addEventListener('DOMContentLoaded', initializeSwiper);

            // Reinitialize Swiper when variant changes
            document.addEventListener('livewire:initialized', () => {
                console.log('Livewire initialized');
                Livewire.on('variantChanged', () => {
                    console.log('Variant changed event received');
                    // We need to wait a bit for the DOM to update before reinitializing
                    setTimeout(() => {
                        initializeSwiper();
                    }, 100);
                });
            });
        </script>
    @endpush
