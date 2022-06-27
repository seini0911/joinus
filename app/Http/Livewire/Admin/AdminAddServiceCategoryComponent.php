<?php

namespace App\Http\Livewire\Admin;

use App\Models\ServiceCategory;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AdminAddServiceCategoryComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $image;
    public $slug;

    //Function to generate a slug
    public function generateSlug()
    {
        $this->slug = Str::slug($this->name,'-');
    }

    //Function to update a category
    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name'=>'required',
            'slug'=>'required',
            'image'=>'required|mimes:jpeg,png'
        ]);
    }


    // Function to add a new category
    public function createNewCategory()
    {
        $this->validate([
            'name'=>'required',
            'slug'=>'required',
            'image'=>'required|mimes:jpeg,png'
        ]);
        $category = new ServiceCategory();
        $category->name = $this->name;
        $category->slug = $this->slug;
        $imageName = Carbon::now()->timestamp.'.'.$this->image->extension();
        $this->image->storeAs('categories',$imageName);
        $category->image = $imageName;
        $category->save();
        session()->flash('message','Catégorie créée avec succès');
    }


    public function render()
    {
        return view('livewire.admin.admin-ajouter-categorie')->layout('layouts.admin_base');
    }
}
