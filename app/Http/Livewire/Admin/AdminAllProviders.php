<?php

namespace App\Http\Livewire\Admin;

use App\Models\ServiceProvider;
use App\Models\User;
use Livewire\Component;

class AdminAllProviders extends Component
{
    public function render()
    {
        $sProvidersNumber = User::where('utype','=','SVP')->count();
        $sProviders = User::where('utype','=','SVP')->get();

        $sproviders = ServiceProvider::all();

        //inactive sproviders
        $inactiveSproviders = ServiceProvider::where('status','=','0')->count();
        $activeSproviders = ServiceProvider::where('status','=','1')->count();
        return view('livewire.admin.admin-all-providers',[
            'sProviders'=>$sProviders, 
            'sProvidersNumber'=>$sProvidersNumber,
            'sproviders'=>$sproviders,
            'inactivesvpnumber'=>$inactiveSproviders,
            'activesvpnumber'=>$activeSproviders,
            ])->layout('layouts.admin_base');
    }
}
