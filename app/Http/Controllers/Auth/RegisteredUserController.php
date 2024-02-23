<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Rules\Recaptchar;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate(
        [
            'secrete_key' => ['required'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'g-recaptcha-response'=>['required', new Recaptchar()],
        ]);

        if(User::count() == 0)
        {
            $path = base_path('config/secretekey.php');
            $file = file_get_contents($path);
            $oldSecreteKey = config('secretekey.secrete_key');
            $newSecreteKey = Hash::make('hello_world');

            if (file_exists($path)) {
                file_put_contents($path, str_replace($oldSecreteKey, $newSecreteKey, $file));
            }
        }

        if(!Hash::check($request->secrete_key, config('secretekey.secrete_key')))
            return redirect()->route('register')->with('secrete_key', 'Your provided key does not match our records');

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

}
