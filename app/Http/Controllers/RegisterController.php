<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index',[
            'title' => 'Register'
        ]);
    }
    public function store(Request $request)
    {
       $validatedData = $request->validate([
        'name' =>'required|max:255',
        'nim' => 'required|unique:users',
        'email' => 'required|email:dns|unique:users',
        'no_hp' => 'required',
        'password' => 'required|min:5'
       ]);

    //    $validatedData['password'] = bcrypt($validatedData['password']);

    $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);
       session()->flash('success', 'Registrasi Berhasil! Silahkan Login');
       return redirect('/login');
    }
}
