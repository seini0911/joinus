<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class AdminAllSubscriptions extends Component
{
    public function render()
    {
        return view('livewire.admin.admin-all-subscriptions')->layout('layouts.admin_base');
    }
}
