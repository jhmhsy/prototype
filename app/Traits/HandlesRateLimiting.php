<?php

namespace App\Traits;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

trait HandlesRateLimiting
{
    protected function ensureIsNotRateLimited($email, $ip)
    {
        $key = $this->throttleKey($email, $ip);
        if (!RateLimiter::tooManyAttempts($key, 5)) {
            return;
        }
        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($key);

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }
    protected function throttleKey($email, $ip): string
    {
        return Str::transliterate(Str::lower($email) . '|' . $ip);
    }
}