<?php

namespace App\Http\Livewire\Sprovider;

use App\Models\User;
use Livewire\Component;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class SproviderDashboardComponent extends Component
{
    public function render()
    {
        //get all notifications from the db linked to the svp loggedIN
        $notifications_number = Notification::where('sprovider_id','=',Auth::user()->id)->count(); 
        $notifications = Notification::where('sprovider_id','=',Auth::user()->id)->get(); 
        return view('livewire.sprovider.sprovider-dashboard-component',[
            'notifications_number'=>$notifications_number,
        ])->layout('layouts.sprovider_base');
    }
}
