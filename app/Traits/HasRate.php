<?php

namespace App\Traits;

use App\Models\Review;

trait HasRate
{
    public function rates()
    {
        return $this->morphMany(Review::class, 'reviewable');
    }

    public function averageRate()
    {
        return count($this->rates) ? $this->rates->sum('rating') / count($this->rates) : 0;
    }

    public function reviewsNumber()
    {
        return count($this->rates);
    }
}
