<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class AdminAllTransactions extends Component
{
    public function render()
    {
        return view('livewire.admin.admin-all-transactions')->layout('layouts.admin_base');
    }
}
