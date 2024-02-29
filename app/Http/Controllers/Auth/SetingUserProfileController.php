<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;


class SetingUserProfileController extends Controller
{
    public function show(User $user): View
    {
        abort_if(auth()->id() !== $user->id, 403,'tidakan ini ilegal');

        return view('auth.profile.seting-profile', compact('user'));
        
    }
    public function update(Request $request, User $user): RedirectResponse
    {

        abort_if(auth()->id() !== $user->id, 403,'tidakan ini ilegal');


        $validated = $request->validate([
            'name' => ['required', 'string', 'max:225'],
            'email' => ['required', 'email', 'unique:users,email,'.$user->id],
            'password' => ['nullable', Password::defaults(),'confirmed'],
        ]);  

        $changesMade = false;
        
        if ($validated['name'] !== $user->name || $validated['email'] !== $user->email) {
            $user->name = $validated['name'];
            $user->email = $validated['email'];
            $changesMade = true;
        }

        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
            $changesMade = true;
        }

        // dd($changesMade);
        if ($changesMade !== true) {
            return back()->with('status', 'Anda tidak melakukan perubahan apapun!');
        }

        $user->save();
        return back()->with('success', 'Profile berhasil diupdate.');
        
    }
}
