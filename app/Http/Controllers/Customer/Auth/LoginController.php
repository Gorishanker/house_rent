<?php

namespace App\Http\Controllers\Customer\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CustomerRequest;
use App\Services\CustomerService;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function homepage()
    {
        return view('customer.homepage');
    }

    public function sign_up(CustomerRequest $request)
    {
        $input = $request->all();
        $coustomer = CustomerService::customerInsert($input);

        return redirect()->route('dashboard');
    }
}
