<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fungsi extends Model
{
    
    use HasFactory;
    protected $table = 'functions';
    protected $fillable = ['nama_fungsi','created_at','updated_at'];
}
