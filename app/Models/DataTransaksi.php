<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataTransaksi extends Model
{
    use HasFactory;
    protected $table='transaksi'; 
    protected $primaryKey = 'id'; 

    protected $fillable = [
        'id',
        'customer_id',
        'service_id',
        'sparepart_id',
        'biaya'

    ];

    public function customer()
    {
        return $this->hasOne(DataCustomer::class, 'id', 'customer_id');
    }

    public function service()
    {
        return $this->hasOne(DataService::class, 'id', 'service_id');
    }

    public function sparepart()
    {
        return $this->hasOne(DataSparepart::class, 'id', 'sparepart_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
