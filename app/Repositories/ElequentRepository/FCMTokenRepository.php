<?php

namespace App\Repositories\ElequentRepository;

use App\Models\FCMToken;
use App\Repositories\BaseRepository;
use App\Repositories\FCMTokenRepositoryInterface;

class FCMTokenRepository extends BaseRepository implements FCMTokenRepositoryInterface
{
    protected $model;

    public function __construct(FCMToken $model)
    {
        $this->model = $model;
    }
}
