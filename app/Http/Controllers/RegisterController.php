<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users',
            'password'=>'required|min:5|max:20'
        ]);
        $user=new User;
        $user->name=$validated['name'];
        $user->email=$validated['email'];
        $user->password=Hash::make($validated['password']);
        $user->save();
        return response()->json('User is register!',201);
    }
}
