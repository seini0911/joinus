<?php

namespace App\Http\Livewire\Sprovider;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SproviderRealisationsComponent extends Component
{
    public function render()
    {

        //récuperer les réalisations du prestataire connectés

       // $user = Auth::user()->name;
        return view('livewire.sprovider.sprovider-realisations-component')->layout('layouts.sprovider_base');
    }
}
