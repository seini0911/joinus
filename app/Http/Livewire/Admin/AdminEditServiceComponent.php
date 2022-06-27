<?php

namespace App\Http\Livewire\Admin;

use App\Models\Service;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Carbon;
use App\Models\ServiceCategory;

class AdminEditServiceComponent extends Component
{

    use WithFileUploads;
    public $name;
    public $slug;
    public $tagline;
    public $service_category_id;
    public $price;
    public $discount;
    public $discount_type;
    public $image;
    public $thumbnail;
    public $description;
    public $inclusion;
    public $exclusion;
    public $newthumbnail;
    public $newimage;
    public $service_id;

    public $featured;

    public function mount($service_slug)
    {
        $service = Service::where('slug',$service_slug)->first();
        $this->service_id = $service->id;
        $this->name = $service->name;
        $this->slug = $service->slug;
        $this->tagline = $service->tagline;
        $this->service_category_id = $service->service_category_id;
        $this->price=  $service->price;
        $this->discount= $service->discount;
        $this->discount_type =  $service->discount_type;
        $this->featured = $service->featured;
        $this->image =  $service->image;
        $this->thumbnail =  $service->thumbnail;
        $this->description =  $service->description;
        $this->inclusion = str_replace("|","\n", $service->description);
        $this->exclusion =  str_replace("|","\n", $service->exclusion);
    }
    
    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name'=>'required',
            'slug'=>'required',
            'tagline'=>'required',
            'service_category_id'=>'required',
            'price'=>'required',
            'description'=>'required',
            'inclusion'=>'required',
            'exclusion'=>'required',
        ]);
        if($this->newthumbnail){
            $this->validateOnly($fields,[
                'newthumbnail'=>'required|mimes:jpeg,png',
            ]);
        }
        if($this->newimage){
            $this->validateOnly($fields,[
                'newimage'=>'required|mimes:jpeg,png',
            ]);
        }
    }
    
    //Function to generate the slug of the service
    public function generateSlug()
    {
        $this->slug = Str::slug($this->name,'-');
    }

    //Function to modify or update a service
    public function updateService()
    {
         //validating the informations send through the form
        $this->validate([
            'name'=>'required',
            'slug'=>'required',
            'tagline'=>'required',
            'service_category_id'=>'required',
            'price'=>'required',
            'description'=>'required',
            'inclusion'=>'required',
            'exclusion'=>'required',
        ]);

        if($this->newthumbnail){
            $this->validate([
                'newthumbnail'=>'required|mimes:jpeg,png',
            ]);
        }
        if($this->newimage){
            $this->validate([
                'newimage'=>'required|mimes:jpeg,png',
            ]);
        }
        
        $service = Service::find($this->service_id);
        $service->name = $this->name;
        $service->slug = $this->slug;
        $service->tagline = $this->tagline;
        $service->service_category_id = $this->service_category_id;
        $service->price = $this->price;
        $service->discount = $this->discount;
        $service->discount_type = $this->discount_type;
        $service->description = $this->description;
        $service->featured = $this->featured;
        $service->inclusion = str_replace("\n",'|',trim($this->inclusion));
        $service->exclusion = str_replace("\n",'|',trim($this->exclusion));

        if($this->newthumbnail){
            //Delete the previous image saved before uploading the new thumbnail image
            unlink('images/services/thumbnails'.'/'.$service->thumbnail);
            
            //Handling of the thumbnail upload
            $imageName = Carbon::now()->timestamp.'.'. $this->newthumbnail->extension();
            $this->newthumbnail->storeAs('services/thumbnails',$imageName);
            $service->thumbnail = $imageName;
        }
        
        if($this->newimage){

            //Delete the previous image of the given service
            unlink('images/services'.'/'.$service->image);
            //Handling of the image upload
            $imageName2 = Carbon::now()->timestamp.'.'. $this->newimage->extension();
            $this->newimage->storeAs('services',$imageName2);
            $service->image = $imageName2;
        }
        //saving of the newly added service
        $service->save();
        session()->flash('message', 'Mise à jour du service effectuer avec succès');
    }
    public function render()
    {
        $categories = ServiceCategory::all();
        return view('livewire.admin.admin-edit-service-component',['categories'=>$categories])->layout('layouts.base');
    }
}
