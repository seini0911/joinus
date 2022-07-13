<?php

namespace App\Http\Livewire;

use App\Models\Service;
use App\Models\ServiceProvider;
use App\Models\User;
use Livewire\Component;

class ServiceDetailsComponent extends Component
{
    public $service_slug;

    public function mount($service_slug)
    {
        $this->service_slug = $service_slug;
    }
    public function render()
    {
        $service = Service::where('slug',$this->service_slug)->first();
        $r_service = Service::where('service_category_id',$service->service_category_id)->where('slug','!=',$this->service_slug)->inRandomOrder()->first();
        $sproviders = ServiceProvider::where('service_id','=',$service->id)->get();

        $users = [];
        $i = 0;

        if($sproviders != null){
            foreach($sproviders as $sprovider){
                $users[$i]['user'] = User::where('id','=',$sprovider->user_id)->first(); 
                $users[$i]['city'] = $sprovider->city;
                $users[$i]['about'] = $sprovider->about;
                $users[$i]['image'] = $sprovider->image;
                $users[$i]['service_location'] = $sprovider->service_location;
                $i++;
            }
        }

        return view('livewire.service-details-component',[
            'service'=>$service,
            'r_service'=>$r_service,
            'sproviders'=>$users,
            ])->layout('layouts.base');
    }
}
