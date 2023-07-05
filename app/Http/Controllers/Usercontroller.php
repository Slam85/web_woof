<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class Usercontroller extends Controller
{
    public function login(){
        return view ('user.login');
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $validate = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($validate)) {
            $request->session()->regenerate();
 
            return redirect()->intended('welcome');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function register(){
        return view ('user.register');
    }

    public function create(Request $request){
        $validate = $request->validate([
            'username' => ['required'],
            'email' => ['required', 'email'],
            'password' => 'min:4|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:4'

        ]);
        $username=request('username');
        $email=request('email');
     
        $password=request('password');

        User::create(['username' => $username,'email' => $email, 'password' => $password]);

        return redirect(route('login'));
    }

    public function update(){ 

    }

    public function edit(){

    }

    public function destroy($id){
        $del = User::findOrFail($id);
        $del->delete();
        return redirect(route('welcome'));
    }
}
