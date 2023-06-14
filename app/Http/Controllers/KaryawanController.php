<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class KaryawanController extends Controller
{
  public function show($nik)
  {
      $karyawan = Karyawan::where('nik', $nik)->first();

      if ($karyawan) {
          return response()->json(['data' => $karyawan], 200);
      }

      return response()->json(['message' => 'Karyawan not found'], 404);
  }

  public function update(Request $request) {
   $karyawan = Karyawan::where('nik', $request->nik)->first();
   
   if ($request->image) {
      $foto = time() . '.' . $request->foto->extension();
      $request->foto->move(public_path('Assets/images/'), $image);
      $karyawan->update([
         "nama_lengkap" => $request->username,
         "no_hp" => $request->no_hp,
         "password" => Hash::make($request->password),
         "foto" => $foto
      ]);
   } else {
      $karyawan->update([
         "nama_lengkap" => $request->username,
         "no_hp" => $request->no_hp,
         "password" => Hash::make($request->password)
      ]);
   }

   

   return Response()->json([
      'status' => 200,
      'data' => [
         "message" => "Update karyawan successfuly"
      ]
   ]);
}
}


