<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class WebController extends Controller
{
    public function home(): JsonResponse
    {
        return response()->json([
            'message' => 'Hello World!',
        ]);
    }
}
