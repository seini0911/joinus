<?php

namespace App\Http\Livewire\Admin;

use App\Models\Service;
use App\Models\ServiceProvider;
use App\Models\User;
use Livewire\Component;

class AdminActivateSproviderAccountComponent extends Component
{
    public $sprovider_id;
    public $spovider_name;
    public $sprovider_phone;
    public $sprovider_city;
    public $sprovider_service_location;
    public $status;
    public $errors;
    public $svp_id;
    
    

    public function mount($sprovider_id){
        //get the user corresponding to the id of the sprovider passed 
        $sprovider = User::find($sprovider_id);

        //put in the different informations and link it to the form in the UI
        $this->sprovider_name = $sprovider->name;
        $this->sprovider_phone = $sprovider->phone;

        //get the user's info in the service_providers table
        $svpinfo = ServiceProvider::where('user_id','=',$sprovider->id)->get()->first();
        $this->svp_id = $svpinfo->id;
        if($svpinfo !=null){

            if($svpinfo->status !=null){
                $this->status = $svpinfo->status;
            }else{
                if($svpinfo->status == null){
                        $this->status = 0;
                }
            }
            $this->sprovider_service_location = $svpinfo->service_location;
            $this->sprovider_city = $svpinfo->city;
        }

    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'status'=>'required',
        ]);
        
    }
    

    public function activateSproviderAccount(){
        //validating the informations send through the form
        $this->validate([
            'status'=>'required',
        ]);
        
        $sprovider = User::find($this->sprovider_id);
        
        $provider = ServiceProvider::find($this->svp_id);
        $provider->status = $this->status;
        $provider->save();
        session()->flash('message', 'Prestataire activé avec succès');
    }

    public function render()
    {
        return view('livewire.admin.admin-activate-sprovider-account-component')->layout('layouts.admin_base');
    }
}
