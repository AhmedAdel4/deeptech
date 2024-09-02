<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FCMToken extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'fcm_tokens';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
