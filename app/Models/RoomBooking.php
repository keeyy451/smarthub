<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomBooking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama_ruangan',
        'tanggal',
        'jam_mulai',
        'jam_selesai',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'tanggal' => 'date',
        ];
    }

    /**
     * Booking belongs to a user
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
