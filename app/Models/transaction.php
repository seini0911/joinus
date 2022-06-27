<?php

namespace App\Models;

use App\Models\User;
use App\Models\Service;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class transaction extends Model
{
    use HasFactory;

    protected $table = "transactions";
    
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
     public function client()
     {
         return $this->belongsTo(User::class,'customer_id');
     }
}
