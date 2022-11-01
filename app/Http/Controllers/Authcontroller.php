<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Authcontroller extends Controller
{
    Public function me(){
    return [
        'NIS' => 3103120143,
        'Name' => 'Muhammad Bintang',
        'Phone' => '085329966272',
        'Class' => 'XII RPL 5',
    ];
}
public function register(Request $request){
    
    $fields = $request->validate([
        'name' => 'required|string|max:100',
        'email' => 'required|string|unique:users,email',
        'password' => 'required|confirmed|min:8'
    ]);

    $user = User::create([
        'name' => $fields['name'],
        'email' => $fields['email'],
        'password' => bcrypt($fields['password'])

    ]);

    $token = $user->CreateToken('tokenku')->plainTextToken;

    $response = [
        'user' => $user,
        'token' => $token
    ];

    return response($response, 201);
}

public function login(Request $request){
    $fields = $request->validate([
        'email' => 'required|string',
        'password' => 'required|string'
    ]);

    // Check email
    $user = user::where('email', $fields['email'])->first();

    // Check password
    if (!$user || !Hash::check($fields['password'], $user->password)){ 
    return response([
        'message' => 'unauthorized'
    ], 401);
}

$token = $user->createToken('tokenku')->plainTextToken;

$response = [
    'user' => $user,
    'token' => $token
];

    return response($response, 201);
}

public function logout(Request $request){
    $request->user()->currentAccessToken()->delete();

    return [
        'message' => 'Logged out'
    ];
}
}