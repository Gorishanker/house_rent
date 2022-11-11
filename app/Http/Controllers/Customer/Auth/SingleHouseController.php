<?php

namespace App\Http\Controllers\Customer\Auth;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;

class SingleHouseController extends Controller
{

     /**
     * Display the specified resource.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function property(Property $property)
    {
        // dd('fh');
        // dd($id);
        // $property = Property::get();
        return view('layouts.customercontent.singleProperty', compact('property'));
    }
}
