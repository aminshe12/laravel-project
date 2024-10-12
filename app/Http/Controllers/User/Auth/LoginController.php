<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Login\LoginRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Show the login form.
     *
     * @return View
     */
    public function showLoginForm(): View
    {
        return view('user.auth.login');
    }

    /**
     * Handle login request.
     *
     * @param LoginRequest $request
     * @return RedirectResponse
     */
    public function loginStore(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->only(['email', 'password']);

        if (Auth::guard('web')->attempt($credentials)) {
            return redirect()->route('user.index')->with('success', 'Welcome to the User Panel');
        }

        return redirect()->route('login')->with('error', 'User Login details are not valid.');
    }
}
