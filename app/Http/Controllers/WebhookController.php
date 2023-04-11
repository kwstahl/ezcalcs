<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
class WebhookController extends Controller
{
    public function handlePayload(Request $request)
    {
        $payload = $request->getContent();

        $event = $request->header('X-GitHub-Event');
        if ($event === 'push') {
            exec('cd /var/www/html/ezcalcs && git pull origin main');
        }
    }
}