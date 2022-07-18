<?php

namespace App\Http\Livewire\Sprovider;

use Livewire\Component;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class SproviderMessages extends Component
{
    public function render()
    {
        $notifications = Notification::where('sprovider_id','=',Auth::user()->id)->get();
        $msgNumber = count($notifications);
        return view('livewire.sprovider.sprovider-messages',[
            'messages'=>$notifications,
            'msg_number'=>$msgNumber,
        ])->layout('layouts.sprovider_base');
    }
}
