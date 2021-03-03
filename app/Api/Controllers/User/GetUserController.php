<?php

namespace App\Api\Controllers\User;

use App\Api\Controllers\Controller;
use Illuminate\Http\Request;

class GetUserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        dd('work');
    }
}
