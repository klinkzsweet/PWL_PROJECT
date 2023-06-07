<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataService extends Model
{
    use HasFactory;
    protected $table='service'; 
    protected $primaryKey = 'id'; 

    protected $fillable = [
        'id',
        'nama',
        'biaya',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
