<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipmentCheckin extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'equipment_id',
        'waktu_checkin',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'waktu_checkin' => 'datetime',
        ];
    }

    /**
     * Checkin belongs to a user
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Checkin belongs to an equipment
     */
    public function equipment()
    {
        return $this->belongsTo(Equipment::class);
    }
}
