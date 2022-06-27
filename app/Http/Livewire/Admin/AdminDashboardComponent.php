<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class AdminDashboardComponent extends Component
{


    
    //Function to get the count of all subscriptions
    public function getCountSubscriptions(){

    }

    //Function to get the count of all revenues
    public function getCountRevenues(){

    }

    //Function to get the count of all taux d'abonnements

    public function getCountTauxAbonnements(){

    }

    //Function to get the count of all clients
    public function getCountClients(){

    }

    //Function to get the count of all service providers
    public function getCountServiceProviders(){

    }

    
    public function render()
    {
        return view('livewire.admin.admin-dashboard-component')->layout('layouts.admin_base');
    }
}
