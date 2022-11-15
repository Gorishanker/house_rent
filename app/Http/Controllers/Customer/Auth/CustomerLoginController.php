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
        if (Customer::where('email', $input['email'])->exists()) {
            $error = 'User already exists with given email';
            return back()->with('status', $error);
            // return view('layouts.login_logout_layouts.login','layouts\login_logout_layouts\base',compact('error'));
        }

        else

        {

        $coustomer = Customer::create($input);
        return redirect()->route('dashboard')->with('success');
        }
    }

    public function login_details (Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Customer::where('email', $credentials['email'])->exists()) {

            if(Customer::where('password', $credentials['password'])->exists()){
                return redirect()->route('dashboard')->with('success');
            }
            else{
                $error ='You have enterd Wrong password';
                return back()->with('status', $error);

                // return view('layouts.login_logout_layouts.login','layouts\login_logout_layouts\base',compact('error'));

                // dd('wrong Password');
            }
        }
        else
        {
            $error ='You have enterd Wrong Email';
            return back()->with('status', $error);

            // return view('layouts.login_logout_layouts.login','layouts\login_logout_layouts\base',compact('error'));
        }

    }

    public function reset ()
    {
        return view('layouts.login_logout_layouts.resetpwd');

    }
}

