<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SoapServer;

class SoapController extends Controller
{
    public function handle(Request $request)
    {
        $server = new SoapServer(null, [
            'uri' => '/soap',
        ]);

        $server->setClass(self::class);
        ob_start();
        $server->handle($request->getContent());
        $response = ob_get_clean();

        return response($response)->header('Content-Type', 'text/xml');
    }

    public function sum($a, $b)
    {
        return $a + $b;
    }

    public function res($a, $b)
    {
        return $a - $b;
    }

    public function mul($a, $b)
    {
        return $a * $b;
    }

    public function div($a, $b)
    {
        if ($b == 0) {
            return "Error: división por cero";
        }
        return $a / $b;
    }

}
