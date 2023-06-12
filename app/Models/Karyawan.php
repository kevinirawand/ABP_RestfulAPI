<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

class Karyawan extends Model implements Authenticatable
{
    use HasApiTokens;

    protected $table = 'karyawan';
    protected $primaryKey = 'nik';
    public $incrementing = false;
    protected $keyType = 'char';
    public $timestamps = false;

    protected $fillable = [
      "nama_lengkap",
      "jabatan",
      "no_hp",
      "foto",
      "kode_dept",
      "kode_cabang",
      "password"
    ];
    // Add any additional model properties or methods here
   
    // Implement the methods from the Authenticatable contract
    public function getAuthIdentifierName()
    {
        return 'nik';
    }

    public function getAuthIdentifier()
    {
        return $this->getAttribute($this->getAuthIdentifierName());
    }

    public function getAuthPassword()
    {
        return $this->getAttribute('password');
    }

    public function getRememberToken()
    {
        return $this->getAttribute($this->getRememberTokenName());
    }

    public function setRememberToken($value)
    {
        $this->setAttribute($this->getRememberTokenName(), $value);
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }
}
