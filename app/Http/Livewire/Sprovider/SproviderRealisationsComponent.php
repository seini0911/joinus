<?php

namespace App\Http\Livewire\Sprovider;

use App\Models\SproviderRealisation;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SproviderRealisationsComponent extends Component
{

    public function render()
    {

        //récuperer les réalisations du prestataire connectés
        $realisations_number  = SproviderRealisation::where('user_id','=',Auth::user()->id)->count();
        $realisations = SproviderRealisation::where('user_id','=',Auth::user()->id)->get();
        
        return view('livewire.sprovider.sprovider-realisations-component',[
            'realisation_number'=>$realisations_number,
            'realisations'=>$realisations,
        ])->layout('layouts.sprovider_base');
    }
}
