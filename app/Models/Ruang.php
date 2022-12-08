<?php

namespace App\Models;
use App\Models\Perkara;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruang extends Model
{
    protected $table = 'ruang';
    protected $primaryKey = 'id';
    protected $fillable = ['id','nama_ruang'];

    public function perkara(){
        return $this->hasMany(Perkara::class);
    }
}
