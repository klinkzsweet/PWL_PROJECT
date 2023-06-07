<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPembelian extends Model
{
    use HasFactory;
    protected $table='pembelian'; 
    protected $primaryKey = 'id'; 

    protected $fillable = [
        'id',
        'sparepart_id',
        'jumlah'

    ];

    public function sparepart()
    {
        return $this->hasOne(DataSparepart::class, 'id', 'sparepart_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
