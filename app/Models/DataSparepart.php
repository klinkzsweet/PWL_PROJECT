<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataSparepart extends Model
{
    use HasFactory;
    protected $table='data_spareparts'; 
    protected $primaryKey = 'id'; 

    protected $fillable = [
        'id',
        'image',
        'nama',
        'harga',

    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
