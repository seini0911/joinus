<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $table = "notifications";
    //Function to get back the service to which a transaction is linked
    public function service()
    {
        return $this->belongsTo(Service::class,'service_id');
    }

      //Function to get back the service to which a transaction is linked
    public function sprovider()
    {
    return $this->belongsTo(User::class,'sprovider_id');
    }

    //Function to get back the client to which a transaction is linked
    public function customer()
    {
        return $this->belongsTo(User::class,'customer_id');
    }
}
