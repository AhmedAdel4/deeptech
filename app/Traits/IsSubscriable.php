<?php

namespace App\Traits;

use App\Models\subscription;

trait IsSubscriable
{
    public function subscriable()
    {
        return $this->morphMany(subscription::class, 'subscriable');
    }
}
