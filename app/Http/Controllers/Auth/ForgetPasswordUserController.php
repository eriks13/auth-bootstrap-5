<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;


class ForgetPasswordUserController extends Controller
{
    public function create():View
    {
        return view('auth.forget-password');
    }

    public function store(Request $request):RedirectResponse
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink($request->only('email'));

        if ($status === Password::RESET_LINK_SENT) {

            return back()->with('success', 'Reset link berhasil dikirim ke email anda. silakan periksa kotak masuk');

        }

        throw ValidationException::withMessages([
            'email' => __(trans('auth.email')),
        ]);

      

    }
}
