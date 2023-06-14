<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
  public function login(Request $request)
  {
      $credentials = $request->validate([
          'nik' => 'required',
          'password' => 'required',
      ]);

      if (Auth::attempt($credentials)) {
          $user = Auth::user();
          $tokenResult = $user->createToken('API Token');
          $token = $tokenResult->accessToken;

          // Retrieve the 'nik' value from the authenticated user
          $nik = $user->nik;
          $name = $user->nama_lengkap;

          return response()->json(['token' => $token, 'nik' => $nik, 'name' => $name], 200);
      }

      throw ValidationException::withMessages([
          'nik' => ['The provided credentials are incorrect.'],
      ]);
  }

}
