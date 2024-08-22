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
use Inertia\Inertia;
use Inertia\Response;
use App\Models\Admin;
use App\Models\Member;

class RegisteredUserController extends AuthController
{
    /**
     * Display the registration view.
     */
    public function create(): Response
    {
        return Inertia::render($this->resource('Auth/Register'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            // 'email' => 'required|string|email|max:255|unique:',//.User::class,
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                function ($attribute, $value, $fail) {
                    $models = [User::class, Admin::class, Member::class];
                    
                    foreach ($models as $model) {
                        if ($model::where('email', $value)->exists()) {
                            return $fail("このメールアドレスは既に登録されています。 (モデル: " . class_basename($model) . ")");
                        }
                    }
                },
            ],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        if ($this->isEmailTaken($request->email)) {
            return back()->withErrors(['email' => 'このメールアドレスは既に登録されています。'])->withInput();
        }

        $modelName = $this->modelName();
        $user = $modelName::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::home());
    }
    
}