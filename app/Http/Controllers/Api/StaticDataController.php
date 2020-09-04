<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Wilaya;

class StaticDataController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param Wilaya $wilaya
     *
     * @return \Illuminate\Http\Response
     */
    public function communes(Wilaya $wilaya)
    {
        $communes = $wilaya->communes()->orderBy('name')->get();

        $data = [];

        foreach ($communes as $commune) {
            $data[] = [
                'id' => $commune->id,
                'name' => $commune->name,
            ];
        }

        return response()->json($data);
    }
}
