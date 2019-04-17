<?php

namespace App\Http\Controllers;

use App\DialogFlowDetectIntent;
use Illuminate\Http\Request;

class SmsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function dialogFlow(Request $request)
    {
        $sms = $request->input('sms');
        $response = DialogFlowDetectIntent::detectIntent(env("PROJECT_ID"),$sms,$request->user()->id);
        return ['response'=>$response];
    }
    //
}
