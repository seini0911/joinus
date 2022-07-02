<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class AdminAllClients extends Component
{
    public function render()
    {
        $customersNumber = User::where('utype','=','CST')->count();
        
        return view('livewire.admin.admin-all-clients',[
            'customersNumber'=>$customersNumber,
        ])->layout('layouts.admin_base');
    }
}
