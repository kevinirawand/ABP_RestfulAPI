<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Karyawan;
use Laravel\Passport\Client;
use Illuminate\Support\Facades\Hash;



class AuthController extends Controller
{
public function login(Request $request)
{
    $credentials = $request->only('nik', 'password');

    $karyawan = Karyawan::where('nik', $credentials['nik'])->first();

   // if (!$karyawan || !Hash::check($credentials['password'], $karyawan->password)) {
   //    return response()->json(['error' => 'Invalid credentials'], 401);
   // }

    Auth::loginUsingId($karyawan->id);

    $tokenResult = $karyawan->createToken('API Token');

    return response()->json(['token' => $tokenResult->accessToken], 200);
}
}
