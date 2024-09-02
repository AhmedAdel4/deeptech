<?php

namespace App\Traits;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Database\Eloquent\Builder;

trait PassportUser
{
    public function findForPassport($username)
    {
        return $this->newQuery()
            ->where(function (Builder $query) use ($username) {
                $query->where('email', $username)
                    ->orWhere('mobile_number', $username);
            })
            ->first();
    }


    // Owerride password here
    public function validateForPassportPasswordGrant($password)
    {
        if (Route::currentRouteName() == 'passport.token') {
            return true;
        }
        return Hash::check($password, $this->password);
    }
}
