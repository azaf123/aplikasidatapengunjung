<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'employees';
    protected $fillable = ['nama_karyawan','no_karyawan','fungsi_id','email','created_at','updated_at'];
    
    public function fungsi(){
        return $this-> BelongsTo('App\Models\Fungsi');
    }
   
}
