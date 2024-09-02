<?php

namespace App\Repositories\ElequentRepository;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Repositories\BaseRepository;
use App\Repositories\UserRepositoryInterface;
use App\Traits\ResponseTrait;
use Illuminate\Support\Facades\Lang;
use Throwable;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    use ResponseTrait;
    protected $model;

    public function __construct(
        User $model
    ) {
        $this->model = $model;
    }

   
}