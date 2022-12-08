<?php

namespace App\Models;
use App\Models\Hakim;
use App\Models\Klasifikasi;
use App\Models\Ruang;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perkara extends Model
{
    protected $table = 'perkara';
    protected $primaryKey = 'id';
    protected $fillable = ['id','no_perkara','terdakwa','tgl_sidang','klasifikasi_id','hakim_id','ruang_id'];

    public function klasifikasi()
    {
        return $this->belongsTo(Klasifikasi::class);
    }

    public function hakim()
    {
        return $this->belongsTo(Hakim::class);
    }

    public function ruang()
    {
        return $this->belongsTo(Ruang::class);
    }

    // public function hakim(){
    //     //return $this->belongsTo(Hakim::class);
    //     return $this->belongsTo(Hakim::class, 'id_hakim', 'id');
    // }

    // public function ruang(){
    //     //return $this->belongsTo(Ruang::class);
    //     return $this->belongsToMany(Ruang::class)->withTimestamps();
    // }
}
