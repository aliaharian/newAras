<?php

namespace App\Http\Controllers\Api;

use App\templateSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    //
    public function homepage()
    {
        $template = templateSetting::all();
        return response()->json($template);
    }
}
