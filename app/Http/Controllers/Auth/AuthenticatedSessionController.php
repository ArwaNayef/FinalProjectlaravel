<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class AuthenticatedSessionController extends Controller
{
//    /**
//     * Display the login view.
//     *
//     * @return \Illuminate\View\View
//     */
    public function create()
    {
        return view('auth.login');
    }

//    /**
//     * Handle an incoming authentication request.
//     *
//     * @param \App\Http\Requests\Auth\LoginRequest $request
//     * @return \Illuminate\Http\RedirectResponse
//     */
    public function store(LoginRequest $request)
    {

        $request->validate([
            'email' => 'Required',
            'password' => 'Required',
        ]);

        $admin = User::where('email', $request['email'])->first();
        if (!$admin) {
            $msg = 'Login Fail, please check email';
            return redirect()->back()->withErrors(['email' => $msg]);
        }
        $decrypt = Crypt::decrypt($admin->password);
        if (!$decrypt)
            throw new DecryptException("Invalid data.");
        if ($request->password != $decrypt) {
            $msg = 'Login Fail, please check password';
            return redirect()->back()->withErrors(['password' => $msg]);
        }
        Auth::login($admin);
        return redirect('/');
    }

//    /**
//     * Destroy an authenticated session.
//     *
//     * @param \Illuminate\Http\Request $request
//     * @return \Illuminate\Http\RedirectResponse
//     */
    public function destroy(Request $request)
    {
        Auth::logout();

        return redirect('/');
    }
}
