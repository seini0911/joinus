<?php

namespace App\Http\Livewire;

use App\Models\Notification;
use App\Models\Service;
use App\Models\User;
use Livewire\Component;
use App\Models\ServiceProvider;
use App\Models\SproviderRealisation;
use Illuminate\Support\Facades\Auth;

class ViewSproviderProfileComponent extends Component
{

    //information linked to the svp
    public $user_id; //svp id 
    public $svp_name; //SVP name
    public $svp_phone; // SVP phone
    public $svp_email; //SVP email
   //loggedUser message

    //customer infos
    public $customer_id;
    public $customer_name;
    public $customer_phone;
    public $customer_email;
    public $customer_message;
    
    //service info
    public $service_id;
    
    public function mount($user_id)
    {
        $this->user_id = $user_id;
        $user = User::where('id','=',$this->user_id)->first();
        $sprovider = ServiceProvider::where('user_id',$this->user_id)->first();
        $this->svp_name = $user->name;
        $this->svp_phone = $user->phone;
        $this->svp_email = $user->email;
        $this->service_id = $sprovider->service_id;
        if(Auth::user() != null){
            $loggedUser = User::where('id','=',Auth::user()->id)->first();
            $this->customer_id = $loggedUser->id;
            $this->customer_email = $loggedUser->email;
            $this->customer_phone = $loggedUser->phone;
            $this->customer_name = $loggedUser->name;
        }else{
            
        }
        
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'customer_name'=>'required',
            'customer_email'=>'required|email',
            'customer_phone'=>'required',
            'customer_message'=>'required', 
        ]);
    }
    public function sendMessage(){
        $this->validate([
            'customer_name'=>'required',
            'customer_email'=>'required|email',
            'customer_phone'=>'required',
            'customer_message'=>'required',
        ]);
        
        
        //Create a notification object that saves infos of the message and the users 
        $notification = new Notification();
        $notification->customer_id = $this->customer_id;
        $notification->sprovider_id = $this->user_id;
        $notification->customer_message = $this->customer_message;
        $notification->service_id = $this->service_id;
        $notification->save();
        session()->flash('message','Votre message a bien été envoyer au prestataire');

    }

    public function render()
    {
        $loggedUser = null;
        if(Auth::user() != null){
            $loggedUser = User::where('id','=',Auth::user()->id)->first();

        }

        $user = User::where('id','=',$this->user_id)->first();
        $sprovider = ServiceProvider::where('user_id',$this->user_id)->first();
        $service = Service::where('id','=',$sprovider->service_id)->first();
        $svp_realisation = SproviderRealisation::where('user_id',$this->user_id)->inRandomOrder()->take(2)->get();
        return view('livewire.view-sprovider-profile-component',[
            'user'=>$user,
            'sprovider'=>$sprovider,
            'loggedUser'=>$loggedUser,
            'svp_service'=>$service,
            'svp_realisation'=>$svp_realisation,
        ])->layout('layouts.base');
    }
}
