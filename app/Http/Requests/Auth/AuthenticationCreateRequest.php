<?php

namespace App\Http\Requests\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;

class AuthenticationCreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ];
    }


    public function authenticate(): void
    {
        $this->ensureIsNotRateLimited();

        $credentials = $this->only('email', 'password');
        $remember = $this->boolean('remember');

        if (! Auth::attempt($credentials, $remember)) {
            $this->handleFailedAttempt();
            return;
        }

        $this->clearLoginAttempts();
    }

    protected function handleFailedAttempt(): void
    {
        RateLimiter::hit($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => 'Kredensial tidak cocok dengan data manapun!',
            'password' => 'password salah. periksa kembali!'
        ]);
    }

    protected function clearLoginAttempts(): void
    {
        RateLimiter::clear($this->throttleKey());
    }

    protected function ensureIsNotRateLimited(): void
    {
        if (RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            $this->handleRateLimited();
        }
    }

    protected function handleRateLimited(): void
    {
        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => 'terlalu banyak Keggagalan. coba lagi dalam ' . ceil($seconds / 60) . ' menit',
        ]);
    }

    protected function throttleKey(): string
    {
        return Str::lower($this->input('email')) . '|' . $this->ip();
    }

    public function validateResolved()
    {
        $this->ensureIsNotRateLimited();

        parent::validateResolved();
    }
}
