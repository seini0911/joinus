<?php

namespace App\Http\Livewire\Sprovider;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Service;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\SproviderRealisation;
use Illuminate\Support\Facades\Auth;

class SproviderAddRealisationComponent extends Component
{
    use WithFileUploads;
    public $sprovider_id;
    public $name;
    public $about;
    public $image;
    public $city;
    public $service_id;
    public $service_location;
    

    public function mount()
    {
        $sprovider_info = User::where('id',Auth::user()->id)->first();
        $this->sprovider_id = $sprovider_info->id;
    }
    
    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name'=>'required',
            'about'=>'required',
            'city'=>'required',
            'service_id'=>'required',
            'service_location'=>'required',
        ]);

        if($this->image){
            $this->validateOnly($fields,[
                'image'=>'required|mimes: jpeg,png,jpg',
            ]);
        }
    }
    
    //Function to add a realisation
    public function addRealisation()
    {
        $this->validate(
            [
            'name'=>'required',
            'about'=>'required',
            'city'=>'required',
            'service_id'=>'required',
            'service_location'=>'required',
            ]
        );

        if($this->image){
            $this->validate(
                [
                    'image'=>'required|mimes: jpeg,png,jpg',
                ]
            );
        }
        $realisation = new SproviderRealisation();

        if($this->image){
            $imageName = Carbon::now()->timestamp.'.'.$this->image->extension();
            $this->image->storeAs('svprealisations',$imageName);
            $realisation->image = $imageName;
        }

        $realisation->name = $this->name;
        $realisation->about = $this->about;
        
        $realisation->city = $this->city;
        $realisation->service_id = $this->service_id;
        $realisation->service_location = $this->service_location;
        $realisation->user_id = $this->sprovider_id;

        $realisation->save();
        session()->flash('message','Nouvelle realisation créée');
        
    }

    public function render()
    {
        $services = Service::where('featured','=','1')->get();
        return view('livewire.sprovider.sprovider-add-realisation-component',[
            'services'=>$services,
        ])->layout('layouts.sprovider_base');
    }
}
