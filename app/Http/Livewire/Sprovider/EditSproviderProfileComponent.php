<?php

namespace App\Http\Livewire\Sprovider;

use App\Models\User;
use App\Models\Service;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Carbon;
use App\Models\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EditSproviderProfileComponent extends Component
{

    use WithFileUploads;
    public $service_provider_id;
    public $name;
    public $image;
    public $phone;
    public $email;
    public $about;
    public $city;
    public $service_id;
    public $service_locations;
    public $newimage;
    public $password;

    public function mount()
    {
         $sprovider = ServiceProvider::where('user_id',Auth::user()->id)->first();
         $sprovider_from_user_table = User::where('id',Auth::user()->id)->first();
         $this->service_provider_id = $sprovider->id;
         $this->image = $sprovider->image;
         $this->about = $sprovider->about;
         $this->city = $sprovider->city;
         $this->service_id = $sprovider->service_id;
         $this->service_locations = $sprovider->service_location;
         
         $this->name = $sprovider_from_user_table->name;
         $this->email = $sprovider_from_user_table->email;
         $this->phone = $sprovider_from_user_table->phone;
         $this->password = $sprovider_from_user_table->password;
    }

    public function updateProfile()
    {
        $sprovider = ServiceProvider::where('user_id', Auth::user()->id)->first(); //info from the providers table
        $sprovider_from_user_table = User::where('id',Auth::user()->id)->first(); //info from the users table

        if($this->newimage)
        {
            $imageName = Carbon::now()->timestamp.'.'.$this->newimage->extension();
            $this->newimage->storeAs('sproviders',$imageName);
            $sprovider->image = $imageName;
        }

        $sprovider->about = $this->about;
        $sprovider->city = $this->city;
        $sprovider->service_id = $this->service_id;
        $sprovider->service_location = $this->service_locations;
       
        $sprovider->save(); //save in providers table

        $sprovider_from_user_table->name = $this->name;
        $sprovider_from_user_table->phone = $this->phone;
        $sprovider_from_user_table->email = $this->email;
        $sprovider_from_user_table->password = Hash::make($this->password);

        $sprovider_from_user_table->save(); //save in users table

        session()->flash('message','Votre profile a été mis à jour avec succès');
    }

    public function render()
    {
        $services = Service::all();

        return view('livewire.sprovider.edit-sprovider-profile-component',[
            'services'=>$services,
        ])->layout('layouts.sprovider_base');
    }
}
