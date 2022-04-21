<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index() 
    {
        $nim = auth()->user()->username;

        $transkrips = DB::select("
        SELECT *
        FROM `v_transkrip`
        WHERE (`nim` = '".$nim."')");

        return view('register.index', [
            'title' => 'Register',
            'active' => 'register',
            'transkrips' => $transkrips,

        ]);
         
    }

    public function store(Request $request) 
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255',
        ]);

        // using bcrypt
        $validatedData['password'] = bcrypt($validatedData['password']);
        // $validatedData['password'] = Hash::make($validatedData['password']);
        
        // hash using sha512
        // $validatedData['password'] = hash('sha512', $validatedData['password']);

        User::create($validatedData);

        // $request->session()->flash('success', 'Registration Successfully!');

        return redirect('/login')->with('success', 'Registration Successfully!');
    }
}
