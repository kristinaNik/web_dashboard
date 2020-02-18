<?php

namespace App\Http\Controllers;

use App\ButtonColor;
use \App\Http\Resources\ButtonColor as ButtonColorResource;
use Illuminate\Http\Request;

class WebDashboardController extends Controller
{


    public function addConfigurations(Request $request)
    {

    }

    /**
     * Get Colors
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getColors() {
        $buttonColors = ButtonColor::all();

        return ButtonColorResource::collection($buttonColors);
    }
}
