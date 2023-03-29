<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Alert;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if($user == null){
            $user = User::where('idPengguna', $request->email)->first();
        }

        if($user != null){
           if($user->status == "1") {
                $request->authenticate();
                $request->session()->regenerate();
                return redirect()->intended(RouteServiceProvider::HOME);
            }
            else{
                session()->flash('message','Anda tidak dapat masuk ke sistem');
                return back();
            } 
        }
        else{
            session()->flash('message','Tiada e-mel didaftarkan');
            return back();
        } 
        
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
