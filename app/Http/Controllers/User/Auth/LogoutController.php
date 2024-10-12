<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    /**
     * @return RedirectResponse
     */
    public function logout(): RedirectResponse
    {
        if (Auth::guard('user'))
        {
            auth()->guard('user')->logout();
        }

        return redirect()->route('user.login');
    }
}
