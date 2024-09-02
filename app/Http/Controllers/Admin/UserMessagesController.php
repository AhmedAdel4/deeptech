<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactUsRequest;
use App\Models\ContactUs;
use App\Models\UserMessage;
use Illuminate\Support\Facades\Lang;
use Throwable;

class UserMessagesController extends Controller
{
    public function index()
    {
        $contactUsData  = UserMessage::where('is_contacted', false)->paginate(10);
        $contactedData = UserMessage::where('is_contacted', true)->paginate(10);
        return view('dashboard.UserMessages.index', ['contactUsData' => $contactUsData, 'contactedData' => $contactedData]);
    }

    public function Contacted($id)
    {
        try{
            $UserMessage = UserMessage::find($id);
            $UserMessage->is_contacted = true;
            $UserMessage->save();
            return redirect(route('userMessage.index'))->with('success',Lang::get('lang.DataUpdated'));
        }
        catch(Throwable $e)
        {
            report($e);
            return $this->JsonResponse(500,'',Lang::get('lang.EnternalServerError'));
        }

    }
}
