<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\AccountCreated;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Traits\HandlesRateLimiting;
use Illuminate\Validation\ValidationException;

class RegisteredUserController extends Controller
{
    use HandlesRateLimiting;

    /**
     * Display the registration view.
     */
    public function create(Request $request): View
    {
        session()->put('form_token', uniqid());

        $email = $request->query('email', '');
        return view('auth.register', ['prefilled_email' => $email]);
        ;
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $this->ensureIsNotRateLimited($request->input('email'), $request->ip());

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));
        $user->assignRole('User');
        Auth::login($user);
        Mail::to($user->email)->send(new AccountCreated($user));
        return redirect(route('welcome', absolute: false));
    }
}