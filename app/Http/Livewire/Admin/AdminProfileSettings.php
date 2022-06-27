<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class AdminProfileSettings extends Component
{
    public function render()
    {
        return view('livewire.admin.admin-profile-settings')->layout('layouts.admin_base');
    }
}
