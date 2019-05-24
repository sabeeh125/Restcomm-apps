<?php

namespace App\Http\Controllers;

use App\DialogFlowDetectIntent;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SmsController extends Controller
{

    public function detectAgent(Request $request, $agentName)
    {
        // list key files that match the requested Agent
        $agentsKey = glob(base_path($agentName . '.json'));
        if (count($agentsKey) == 1) {
            $response = DialogFlowDetectIntent::detectIntent(
                array_pop($agentsKey),
                $request->input('sms'),
                $agentName.'-'.$request->user()->id
            );
            return ['response' => $response];
        }
        return response()->json([
            'response' => 'Agent not found'
        ])->setStatusCode(Response::HTTP_BAD_REQUEST);
    }

}
