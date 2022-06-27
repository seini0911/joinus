<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = "services";
    
    //Function to get back the category to which a service is linked
    public function category()
    {
        return $this->belongsTo(ServiceCategory::class,'service_category_id');
    }
    
    // a service is having many transactions linked to it
    public function transactions()
    {
        return $this->hasMany(transaction::class);
    }
}
