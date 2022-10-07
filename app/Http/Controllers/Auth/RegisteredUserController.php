<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Str;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('front.auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'f_name' => ['required', 'string', 'max:255'],
            'l_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'user_name' => ['required', 'string', 'max:50', 'unique:users,user_name'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            // 'phone' => ['numeric', 'min:10', 'nullable'],
            // 'address' => ['string', 'nullable'],
        ]);



        $user = new User();

        $user->full_name = $request->f_name . " " . $request->l_name;
        $user->email = $request->email;
        $user->user_name = $request->user_name;
        $user->password = Hash::make($request->password);
        $user->role_id = 3;

        $user->save();



        event(new Registered($user));

        Auth::login($user);

        return redirect(route('view.client.dashboard'));
    }
}
