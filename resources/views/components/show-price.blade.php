@props(['variant'])
@php
    $currentDate = now();
    // Determine if we should show the offer price
    $showOfferPrice = false;

    if ($variant->offer_price) {
        // Check if only start date is present
        if ($variant->offer_start_date && !$variant->offer_end_date) {
            $showOfferPrice = $currentDate->greaterThanOrEqualTo($variant->offer_start_date);
        }
        // Check if both start and end dates are present
        elseif ($variant->offer_start_date && $variant->offer_end_date) {
            $showOfferPrice = $currentDate->between($variant->offer_start_date, $variant->offer_end_date);
        }
        // Check if both dates are null
        elseif (!$variant->offer_start_date && !$variant->offer_end_date) {
            $showOfferPrice = true;
        }
    }
@endphp

<div class="price-display">
    @if ($showOfferPrice)
        <span class="offer-price text-danger fw-bold h5 d-block"><i class="bi bi-currency-rupee"></i>{{ number_format($variant->offer_price, 2) }}</span>
        <span
            class="original-price text-muted text-decoration-line-through font-normal d-block"><i class="bi bi-currency-rupee"></i>{{ number_format($variant->price, 2) }}</span>
    @else
        <span class="normal-price h5 d-block"><i class="bi bi-currency-rupee"></i>{{ number_format($variant->price, 2) }}</span>
    @endif
</div>
