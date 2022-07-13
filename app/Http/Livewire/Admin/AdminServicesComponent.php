<?php

namespace App\Http\Livewire\Admin;

use App\Models\Service;
use Livewire\Component;
use Livewire\WithPagination;

class AdminServicesComponent extends Component
{
    use WithPagination;

    public function deleteService($service_id)
    {
        $service = Service::find($service_id);
        
        //delete the service thumbnail if exist
        if($service->thumbnail){
            unlink('images/services/thumbnails'.'/'.$service->thumbnail);

        }

        //delete the service image if exist
        if($service->image)
        {
            unlink('images/services'.'/'.$service->image);

        }

        $service->delete();
        session()->flash('message','Le service '.$service->name.' a été supprimer avec succès');
    }
    public function render()
    {
        $servicesNumber = Service::all()->count();
        $statusServices = Service::where('status','=','1')->count();
        $unStatusServices = Service::where('status','=','0')->count();
        $featuredServices = Service::where('featured','=','1')->count();
        $unfeaturedServices = Service::where('featured','=','0')->count();
        $services = Service::paginate(10);
        return view('livewire.admin.admin-services',['services'=>$services, 'servicesNumber'=>$servicesNumber,'featuredServices'=>$featuredServices, 'unfeaturedServices'=>$unfeaturedServices])->layout('layouts.admin_base');
    }
}
