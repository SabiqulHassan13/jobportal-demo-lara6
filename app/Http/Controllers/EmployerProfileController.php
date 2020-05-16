<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Company;
use App\User;


class EmployerProfileController extends Controller
{
    

    public function store(Request $request) {

        $user = User::create([
            'email'     => request('email'),
            'user_type' => request('user_type'),
            'password'  => Hash::make(request('password')),
        ]);
        
        Company::create([
            'user_id'   => $user->id,
            'name'      => request('name'),
            'slug'      => Str::slug(request('name')),
        ]);

        return redirect()->route('login');
    }



}
