<?php

namespace App\Http\Controllers\Customer\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CustomerRequest;
use App\Models\Category;
use App\Models\Property;
use App\Services\CustomerService;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function homepage()
    {
        // $input = $request->all();
        // dd($input);
        $categories = Category::all();
        $properties = Property::all();
        // dd($category);
        return view('customer.homepage', compact('categories','properties'));
    }

    public function sign_up(CustomerRequest $request)
    {
        $input = $request->all();
        $coustomer = CustomerService::customerInsert($input);

        return redirect()->route('dashboard');
    }
}
