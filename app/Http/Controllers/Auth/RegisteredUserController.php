<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('login.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'alpha', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', Rules\Password::defaults(), 'confirmed'],
            'tel' => ['required', 'string', 'max:255','unique:'.User::class],
        ], [
            'name.required' => 'Поле имя является обязательным.',
            'name.alpha' => 'Поле имя должно состоять только из букв',
            'email.required' => 'Поле email является обязательным.',
            'email.unique' => 'Пользователь с таким email уже зарегистрирован.',
            'password.required' => 'Поле пароль является обязательным.',
            'password.min' => 'Пароль должен состоять минимум из 8 символов',
            'password.confirmed' => 'Пароль и его подтверждение не совпадают.',
            'tel.required' => 'Поле телефон является обязательным.',
            'tel.unique' => 'Пользователь с таким телефоном уже зарегистрирован.',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'tel' => $request->tel,
            'password' => Hash::make($request->password),
        ]);
        $user->sendEmailVerificationNotification();
        event(new Registered($user));
        Auth::login($user);
        if ($user->hasVerifiedEmail()) {
            // User is authenticated and email is verified
            return response()->json(['redirect_url' => route('main.index')]);
        } else {
            // Email is not verified, logout the user and redirect back to login page
            return response()->json(['redirect_url' => route('verification.notice')]);
        }
    }
}
