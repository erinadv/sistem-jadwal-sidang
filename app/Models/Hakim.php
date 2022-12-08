<?php

namespace App\Models;
use App\Models\Perkara;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hakim extends Model
{
    protected $table = 'hakim';
    protected $primaryKey = 'id';
    protected $fillable = ['id','nama_hakim','golongan','nip'];

    public function perkara(){
        return $this->hasMany(Perkara::class);
    }
}
