<?php

namespace App\Http\Controllers\Customer\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerLoginController extends Controller
{
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
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {

            return redirect()->route('dashboard')
            ->with('success');

        }
        else {
            return redirect()->route('dashboard')
            ->with('success');
        }
    }

    public function reset ()
    {
        return view('layouts.login_logout_layouts.resetpwd');

    }
}
