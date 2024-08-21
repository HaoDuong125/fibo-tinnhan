<?php

namespace App\Http\Controllers\API;

use App\Enums\EMessageStatusReturn;
use App\Http\Controllers\Controller;
use App\Models\Messages;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    
    public function __construct()
    {
        
    }

    function getMessage(Request $request) {
        logger($request->all());
        Messages::insert($request->all());
        return response()->json([
            'msg' => "Success",
        ], 200);
    }
}
