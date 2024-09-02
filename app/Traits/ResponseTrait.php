<?php

namespace App\Traits;


trait ResponseTrait
{
    public function JsonResponse($code,$data,$Message)
    {
        return[
            'status'=> $code,
            'message' => $Message,
            'data'=>$data

        ];;
    }

   
}
