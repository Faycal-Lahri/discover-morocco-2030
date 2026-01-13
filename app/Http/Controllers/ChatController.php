<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ChatController extends Controller
{
    public function sendMessage(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
        ]);

        $message = $request->input('message');
        $sessionId = session()->getId(); 
        
        // URL from config
        $n8nUrl = config('services.n8n.chat_webhook_url');

        if (!$n8nUrl) {
            // For dev purposes, fallback or error
            return response()->json(['error' => 'Chatbot service not configured in .env (N8N_CHAT_WEBHOOK_URL).'], 503);
        }

        try {
            // Send to n8n Webhook
            $response = Http::timeout(60)->post($n8nUrl, [
                'message' => $message,
                'sessionId' => $sessionId,
                'timestamp' => now()->toIso8601String(),
            ]);

            if ($response->successful()) {
                $data = $response->json();
                // We expect n8n to return JSON with an 'output' field
                return response()->json([
                    'reply' => $data['output'] ?? 'I received your message but got no text response.'
                ]);
            } else {
                Log::error('n8n Chat Error: ' . $response->status() . ' - ' . $response->body());
                return response()->json(['error' => 'AI service currently unavailable.'], 500);
            }
        } catch (\Exception $e) {
            Log::error('Chat Controller Exception: ' . $e->getMessage());
            return response()->json(['error' => 'Connection error. Please try again.'], 500);
        }
    }
}
