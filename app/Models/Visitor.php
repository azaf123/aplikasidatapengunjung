<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Visitor extends Model
{
    use HasFactory;
    protected $table = 'visitors';
    protected $fillable = ['image','nama_pengunjung','alamat','fungsi_id','employee_id','keperluan','petugas_id','card_id','status','contact','created_at','updated_at'];

    public function fungsi(){
        return $this->BelongsTo('App\Models\Fungsi');
    }

    public function employee(){
        return $this->belongsTo('App\Models\Employee');
    }
    public function card(){
        return $this->belongsTo(Card::class);
    }
    
    
}
