<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
class WebhookController extends Controller
{
    public function handlePayload(Request $request)
    {
        $payload = $request->getContent();
        // Pull changes from Git repository
        $event = $request->header('X-GitHub-Event');
        if ($event === 'push') {
            exec('cd /var/www/html/ezcalcs && git pull origin main');
        }

        // clear laravel cache
        \Artisan::call('cache:clear');
        //update autoloaded files
        \Artisan::call('optimize');
        //Reload PHP-FOM or web server
        // ...

        //return a response to GitHub
        return response('OK',200);
    }
}