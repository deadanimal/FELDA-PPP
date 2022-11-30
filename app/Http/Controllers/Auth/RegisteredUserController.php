<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'idPengguna' => ['required', 'string', 'max:12', 'unique:'.User::class],
            'nama' => ['required', 'string', 'max:100' ],
            'nokadpengenalan' => ['required', 'string', 'max:12', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'kategoripengguna' => ['required'],
            'Wilayah' => ['required'],
        ]);

        $user = User::create([
            'idPengguna' => $request->idPengguna,
            'nama' => $request->nama,
            'nokadpengenalan' => $request->nokadpengenalan,
            'password' =>  Hash::make($request->password),
            'kategoripengguna' => $request->kategoripengguna,
            'Wilayah' => $request->Wilayah,
        ]);

        event(new Registered($user));

        return redirect("/pengurusanPengguna");
    }
}
