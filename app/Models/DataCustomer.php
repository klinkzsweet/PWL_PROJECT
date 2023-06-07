<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataCustomer extends Model
{
    use HasFactory;
    protected $table='data_customers'; 
    protected $primaryKey = 'id'; 

    protected $fillable = [
        'id',
        'image',
        'nama',
        'alamat',
        'notelp',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
