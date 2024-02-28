<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

use Illuminate\View\View;

class EmailVerificationUserController extends Controller
{
    public function create(): RedirectResponse|View
    {
        session()->flash('success', 'Link Email ferifikasi telah di kirim silakan periksa kotak masuk!');
        return view('auth.verify-email');
    }

    public function store(EmailVerificationRequest $request): RedirectResponse
    {
        $request->fulfill();
        return redirect()->intended(RouteServiceProvider::HOME)->with('success', 'selamat datang');
    }

    public function resend(Request $request): RedirectResponse
    {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('success', 'verifikasi di kirim kembali. periksa kotak masuk email anda!');
    }
}
