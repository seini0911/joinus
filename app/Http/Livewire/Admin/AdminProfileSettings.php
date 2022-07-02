<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class AdminProfileSettings extends Component
{
    
    public $adminid;
    public $name;
    public $email;
    public $phone;
   
    public $password;

    public function mount($adminid)
    {
        $user = User::find(Auth::user()->id);
        $this->adminid = $user->id;
        $this->name = $user->name;
        $this->email= $user->email;
        $this->phone = $user->phone;
        $this->password = $user->password;

    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name'=>'required',
            'email'=>'required|email',
            'phone'=>'required',
            'password'=>'required', 
        ]);
    }

    public function updateProfile(){
        $this->validate([
            'name'=>'required',
            'email'=>'required|email',
            'phone'=>'required',
            'password'=>'required',
        ]);
        $user = User::find($this->adminid);
        $user->name= $this->name;
        $user->email = $this->email;
        $user->phone = $this->phone;
        $user->password = $this->password;
        $user->save();
        session()->flash('message','Mise à jour du profile effectuer avec succès');

    }
    public function render()
    {
        return view('livewire.admin.admin-profile-settings')->layout('layouts.admin_base');
    }
}
