<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;

class CustomAuthController extends Controller
{

    public function index()
    {
        return view('login');
    }


    public function customLogin(Request $request)
    {
        $errors = new MessageBag;
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('beranda')
                ->withSuccess('Berhasil Login');
        }

        $errors = new MessageBag(['password' => ['Email or password is incorrect.']]);

        return redirect("login")->withErrors($errors)->withSuccess('Login details are not valid');
    }



    public function registration()
    {
        return view('registration');
    }


    public function customRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect("beranda")->withSuccess('have signed-in');
    }


    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }


    public function dashboard()
    {
        if (Auth::check()) {
            return view('beranda');
        }

        return redirect("login")->withSuccess('are not allowed to access');
    }
    public function signOut()
    {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}
