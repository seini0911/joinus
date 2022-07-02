<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class AdminAllProviders extends Component
{
    public function render()
    {
        $sProvidersNumber = User::where('utype','=','SVP')->count();
        $sProviders = User::where('utype','=','SVP')->get();
        return view('livewire.admin.admin-all-providers',['sProviders'=>$sProviders, 'sProvidersNumber'=>$sProvidersNumber])->layout('layouts.admin_base');
    }
}
