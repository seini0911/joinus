<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SproviderRealisation extends Model
{
    use HasFactory;

    protected $table = "sprovider_realisations";
    public function service()
    {
        return $this->belongsTo(Service::class,'service_id');
    }
}
