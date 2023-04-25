<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;


class SympiAPIController extends Controller
{
    /**
     * Direct incoming request data from to symfony
     */
    public function process(Request $request) 
    {
        $testdata = $request->input('testdata');
        $process = new Process(['python3', '/ezcalcs/sympyScript.py', $testdata]);
        $process->run();
        $output = $process->getOutput();
        return 'hello ' + $output;
    }

}
