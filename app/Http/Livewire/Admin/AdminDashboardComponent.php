<?php

namespace App\Http\Livewire\Admin;

use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\User;
use Livewire\Component;

class AdminDashboardComponent extends Component
{



    
    public function render()
    {
        $sprovidersNumber = User::where('utype','=','SVP')->count();
        $customersNumber = User::where('utype','=','CST')->count();
        $scategoriesNumber = ServiceCategory::all()->count();
        $servicesNumber = Service::all()->count();
        /*
        $sprovidersNumber = User::where('utype','=','SVP')->count();
        */
        return view('livewire.admin.admin-dashboard-component',[
            'sprovidersNumber'=>$sprovidersNumber,
            'customersNumber'=>$customersNumber,
            'scategoriesNumber'=>$scategoriesNumber,
            'servicesNumber'=>$servicesNumber,
        ])->layout('layouts.admin_base');
    }
}
