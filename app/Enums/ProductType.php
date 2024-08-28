<?php

namespace App\Enums;

enum ProductType: int
{
    case NORMAL = 0;
    case TOP_RATED = 1;
    case FEATURED = 2;
    case BEST_SELLER = 3;
    case DEAL_OF_THE_DAY = 4;

    public function getTitle(): string
    {
        return match ($this) {
            self::TOP_RATED => 'Top Rated',
            self::FEATURED => 'Featured',
            self::BEST_SELLER => 'Best Seller',
            self::DEAL_OF_THE_DAY => 'Deal of the day',
            self::NORMAL => '', // Optional: if a title for NORMAL is needed
        };
    }
}
