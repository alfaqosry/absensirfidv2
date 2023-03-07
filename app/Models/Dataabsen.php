<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dataabsen extends Model
{
    use HasFactory;

    protected $fillable = [
        'jadwal_id',
        'user_id',
        'status',
        'in',
        'out'
        
    ];

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    //     // 'id'            => 'string',
    // ];
}
