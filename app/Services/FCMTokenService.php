<?php

namespace App\Services;

use App\Models\FCMToken;

class FCMTokenService
{
    public function createOrUpdate($user, $fcmToken)
    {
        $existsFcmToken = FCMToken::where('fcm_token', $fcmToken)->where('user_id', '!=', $user->id)->first();
        if ($existsFcmToken) {
            $existsFcmToken->delete();
        }
        FCMToken::updateOrCreate(['user_id' => $user->id], ['fcm_token' => $fcmToken]);
    }
}
