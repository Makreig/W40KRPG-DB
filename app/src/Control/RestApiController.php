<?php

namespace App\Control;

use SilverStripe\Control\Controller;

class RestApiController extends Controller
{
    private static $url_handlers = [
        'restapi/$@' => 'index',
    ];

    public function index($request)
    {
        return "With the right parameters, i can return any data needed";
    }
}
