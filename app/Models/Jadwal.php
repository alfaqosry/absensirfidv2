<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $fillable = [
        'kerjake',
        'tasemeter_id',
        'tanggal',
        'bulan',
        'tahun',
        'hari'
        
    ];

    public function dataabsen()
    {
        return $this->hasMany(Dataabsen::class);
    }

    public function tasemeter()
    {
        return $this->belongsTo(Tasemeter::class);
    }

  
}
