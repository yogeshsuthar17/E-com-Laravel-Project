<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminRegistrationController extends Controller
{
    public function create() {
        return view('registration.admin.create');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:user',
            'mobile' => 'required|max:10',
            'profile_pic' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'password' => 'required|string|min:8',
        ]);
    
        // Hash the password before storing it in the database
        $data['password'] = Hash::make($data['password']);

        // Store the file to the public folder of the project
        $imageName = time() . '.' . $request->image->getClientOriginalExtension();
        $request->image->move(public_path('profile_pic'), $imageName);
    
        // Store the original filename in the database
        $data['profile_pic'] = $request->profile_pic->getClientOriginalName();
        User::create($data);
        return redirect()->route('/')->with('success', 'User registered successfully!');
    }

}

