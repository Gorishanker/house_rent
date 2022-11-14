<?php

namespace App\Http\Controllers\Customer\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CustomerRequest;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Property;
use App\Services\CustomerService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

    // public function sign_up(CustomerRequest $request)
    // {
    //     $input = $request->all();
    //     $coustomer = CustomerService::customerInsert($input);

    //     return redirect()->route('dashboard');
    // }

    public function login ()
    {
        return view('layouts.login_logout_layouts.login');

    }

    public function sign_up ()
    {
        return view('layouts.login_logout_layouts.sign_up');

    }

    public function storeSignupDetails (CustomerRequest $request)
    {
        $input = $request->all();
        // $input['password'] = Hash::make($input['password']);

        // dd($input);
        $coustomer = Customer::create($input);
        return redirect()->route('dashboard')
        // return view('customer.homepage')
        ->with('success');
    }

    public function login_details (Request $request)
    {

    }

    public function reset ()
    {
        return view('layouts.login_logout_layouts.resetpwd');

    }


}
