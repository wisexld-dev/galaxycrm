<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class WebhookController extends Controller {
    public function discord(Request $r){
        $payload = $r->validate(['content'=>'required']);
        $webhook = config('services.discord.webhook') ?: env('DISCORD_WEBHOOK_URL');
        if(!$webhook) return response()->json(['error'=>'no webhook configured'],400);
        $client = new Client();
        $client->post($webhook, ['json'=>['content'=>$payload['content']],'timeout'=>env('HTTP_CLIENT_TIMEOUT',10)]);
        return response()->json(['ok'=>true]);
    }
}
