<?php

namespace App\Http\Requests\Auth;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;



class UserRegisterCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:225'],
            'email' => ['required', 'string', 'email', 'unique:'.User::class],
            'password' => ['required', Rules\Password::defaults(), 'confirmed'],
        ];
    }
    public function messages():array
    {
        return [
            'name.required' => 'nama tidak boleh kosong',
            'email.unique' => 'email harus  unik. email yang inda input telah di gunakan sebelumnya',
            'password.required' => 'password tidak boleh kosong. mksimal 8 karakter!',
            'password.min' => 'password minimal 8 karakter!',
            'password.confirmed' => 'Konfirmasi password tidak cocok!',
        ];
    }
}
