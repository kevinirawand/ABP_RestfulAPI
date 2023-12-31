<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;
use Illuminate\Support\Facades\Hash;


class KaryawanController extends Controller
{
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

   public function getOneKaryawan(Request $request) {
      return response()->json([
         'status' => 200,
         'data' => [
            Karyawan::where('nik', $request->nik)->first()
         ]
      ]);
   }
}
