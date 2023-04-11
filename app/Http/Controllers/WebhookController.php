<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
class WebhookController extends Controller
{
    public function handlePayload(Request $request)
    {
        $output = shell_exec('cd /path/to/your/repository && git pull origin main');
        echo $output;
        return response('OK',200);
    }
}