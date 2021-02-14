<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginFormRequest as FormRequest;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    /**
     * @param FormRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(FormRequest $request)
    {
        //dd($request->all());
        $credentials = auth()->attempt($request->only('email', 'password'));

        if(!$credentials){
            return back()->with('status', 'Invalid login details');
        }

        return redirect()->route('dashboard');
    }
}
