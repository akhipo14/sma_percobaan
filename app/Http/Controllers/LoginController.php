<?php

namespace App\Http\Controllers;

use App\Models\Login;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.login.index');
    }

    /**
     * Show the form for creating a new resource.
     */

     public function authenticate(Request $request){
        $credentials = $request->validate([
            'name' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            toast('Login berhasil', 'success');
            return redirect()->intended('/admin-dashboard');
        }

         toast('Nama atau Password Salah !', 'error');
        return redirect('/login');
     }

     public function logout(Request $request): RedirectResponse
     {
         Auth::logout();
      
         $request->session()->invalidate();
      
         $request->session()->regenerateToken();
      
         return redirect('/');
     }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Login $login)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Login $login)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Login $login)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Login $login)
    {
        //
    }
}
