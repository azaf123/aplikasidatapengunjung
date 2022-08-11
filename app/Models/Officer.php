<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Officer extends Model
{
    use HasFactory;
    protected $table = 'officers';
    protected $fillable = ['nama_petugas','no_pegawai','username','password','level','email','created_at','updated_at'];

 
    
}
