<?php

namespace App\Models;
use App\Models\Perkara;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Klasifikasi extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'klasifikasi';
    protected $primaryKey = 'id';
    protected $fillable = ['id','klasifikasi_perkara'];

    public function perkara(){
        return $this->hasMany(Perkara::class);
    }


}
