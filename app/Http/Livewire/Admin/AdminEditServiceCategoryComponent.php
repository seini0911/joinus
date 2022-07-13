<?php

namespace App\Http\Livewire\Admin;

use App\Models\ServiceCategory;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
class AdminEditServiceCategoryComponent extends Component
{
    use WithFileUploads;
    public $category_id;
    public $name;
    public $slug;
    public $image;
    public $newimage;

    public $featured;

    public function mount($category_id)
    {
        //Search a Service Category having the same id as the param passed in the function
        $scategory = ServiceCategory::find($category_id);
        $this->category_id = $scategory->id;
        $this->name = $scategory->name;
        $this->slug = $scategory->slug;
        $this->image = $scategory->image;
        $this->featured = $scategory->featured;
    }

    //Function generating the slug of the service category
    public function generateSlug()
    {
        $this->slug = Str::slug($this->name,'-');
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name'=>'required',
            'slug'=>'required',
        ]);

        if($this->newimage){
            $this->validateOnly($fields,[
                'newimage'=>'required|mimes:jpeg,png',
            ]);
        }
    }

    public function updateServiceCategory()
    {
        $this->validate(
            [
                'name'=>'required',
                'slug'=>'required',
            ]            
        );

        //checking and validating the new image to upload
        if($this->newimage){
            $this->validate([
                'newimage'=>'required|mimes:jpeg,png',
            ]);
        }

        //Search for the service category 
        $scategory = ServiceCategory::find($this->category_id);
        $scategory->name = $this->name;
        $scategory->slug= $this->slug;
        $scategory->featured = $this->featured;
        if($this->newimage){
            $imagename = Carbon::now()->timestamp.'.'.$this->newimage->extension();
            $this->newimage->storeAs('categories',$imagename);
            $scategory->image = $imagename;
        }
        
        $scategory->save();
        session()->flash('message','Mise à jour effectuée avec succès');
    }

    public function render()
    {
        return view('livewire.admin.admin-edit-service-category-component')->layout('layouts.admin_base');
    }
}
