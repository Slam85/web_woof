<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Usercontroller extends Controller
{
    public function login()
    {
        return view('user.login');
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $validate = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($validate)) {
            $request->session()->regenerate();

            return redirect('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function register()
    {
        return view('user.register');
    }

    public function create(Request $request)
    {
        $validate = $request->validate([
            'username' => ['required'],
            'email' => ['required', 'email'],
            'password' => 'min:4|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:4'

        ]);
        $username = request('username');
        $email = request('email');
        $picture = $request->file('image');
        $password = request('password');

        $uuid = Str::uuid()->toString();

        User::create(['username' => $username, 'email' => $email, 'password' => $password, 'uuid' => $uuid]);


        Storage::putFileAs('public/images', $picture, $uuid . '.jpg');

        $request->session()->regenerate();



        return redirect(route('login'));
    }

    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'username' => ['required'],
            'email' => ['required', 'email'],
            'password' => 'min:4|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:4'

        ]);

        $update = User::find($id);
        $update->username = request('username');
        $update->email = request('email');
        $update->password = request('password');
        $update->save();
        return redirect('/');
    }

    public function edit()
    {
        return view('user.edit');
    }
    public function deconnexion()
    {
        auth()->logout();

        return redirect('/');
    }

    public function destroy($id)
    {
        $del = User::findOrFail($id);
        $del->delete();
        return redirect(route('welcome'));
    }
}
