<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class AdminAllClients extends Component
{
    public function render()
    {
        return view('livewire.admin.admin-all-clients')->layout('layouts.admin_base');
    }
}
