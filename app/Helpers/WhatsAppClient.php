<?php

namespace App\Helpers;

use App\Exceptions\CustomException;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class WhatsAppClient
{
    public static function sendMessage($message, $recipients = [])
    {
        if (empty($recipients)) return false;

        $token = config('services.whatsApp.token');

        if (empty($token)) {
            throw new CustomException('Invalid Token.');
        }

        $apiUrl = config('services.whatsApp.baseUrl') . '/' . config('services.whatsApp.phoneNoId') . '/messages';
        $response =  Http::withToken($token)->post($apiUrl, [
            "messaging_product" => "whatsapp",
            "to" => current($recipients),
            "type" => "template",
            "template" => [
                "name" => "hello_world",
                "language" => [
                    "code" => "en_US"
                ]
            ]
        ]);

        if ($response->clientError()) {
            Log::info([
                'action' => 'Send WhatsApp message',
                'status' => 'failed',
                'errorType' => 'external error',
                'error' => $response->json() ?? []
            ]);
            throw new CustomException($response->json()['error']['message']);
        }

        if ($response->serverError()) {
            Log::info([
                'action' => 'Send WhatsApp message',
                'status' => 'failed',
                'errorType' => 'internal error',
                'error' => $response->json() ?? []
            ]);
            throw new CustomException($response->json()['error']['message']);
        }

        return true;
    }
}
