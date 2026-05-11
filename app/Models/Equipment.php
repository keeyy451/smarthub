<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;

    protected $table = 'equipments';

    protected $fillable = [
        'nama_peralatan',
        'kategori',
        'kondisi',
        'status',
        'jumlah',
    ];

    /**
     * Equipment has many checkins
     */
    public function equipmentCheckins()
    {
        return $this->hasMany(EquipmentCheckin::class);
    }
}
