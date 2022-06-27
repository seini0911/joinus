<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    use HasFactory;

    protected $table = "service_categories";

    //Function that links all the services belonging to a category
    public function services()
    {
        return $this->hasMany(Service::class);
    }
}
