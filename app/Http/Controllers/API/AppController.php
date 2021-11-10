<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function request(Request $request) 
    {
        if (isset($request->conversation_id) && isset($request->message)) {
            $message = ucwords($request->message);
            $response = "Sorry, I don't understand";

            if (str_contains($message, 'Hello') || str_contains($message, 'Hi')) {
                $response = "Welcome to StationFive.";
            } elseif (str_contains($message, 'Goodbye') || str_contains($message, 'Bye')) {
                $response = "Thank you, see you arround.";
            }

            $json = [
                'response_id' => $request->conversation_id,
                'response' => $response
            ];

            return json_encode($json);
        } else {
            $json = [
                'code' => '400',
                'response' => 'Bad request'
            ];
            return json_encode($json);
        }
    }
}
