<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\UserRegisterCreateRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;


class RegisterUserController extends Controller
{
    public function create():View
    {
        return view('auth.register');
    }
    public function store(UserRegisterCreateRequest $request):RedirectResponse
    {
        $uservalidated = $request->validated();

        $uservalidated['password'] = Hash::make($uservalidated['password']);

        $user = User::create($uservalidated);

        // event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME)->with('success', 'Hallo Selamat Datang!');

    }
}
