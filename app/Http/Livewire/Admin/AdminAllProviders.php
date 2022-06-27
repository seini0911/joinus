<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class AdminAllProviders extends Component
{
    public function render()
    {
        return view('livewire.admin.admin-all-providers')->layout('layouts.admin_base');
    }
}
