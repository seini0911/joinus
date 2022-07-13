<?php

namespace App\Http\Livewire\Admin;
use App\Models\ServiceCategory;
use Livewire\WithPagination;


use Livewire\Component;

class AdminServiceCategoryComponent extends Component
{
    use WithPagination;



    public function deleteserviceCategory($id)
    {
        $scategories = ServiceCategory::find($id);
        //if image of the category exist, we first delete it
        if($scategories->image)
        {
            unlink('images/categories'.'/'.$scategories->image);
        }
        $scategories->delete();
        session()->flash('message','La catégorie :'.$scategories->name.' a été supprimée avec succès');
    }
    
    public function render()
    {
        $scategoriesnumber = ServiceCategory::all()->count();
        $featuredSCategories = ServiceCategory::where('featured','=','1')->count();
        $unfeaturedSCategories = ServiceCategory::where('featured','=','0')->count();
        $scategories= ServiceCategory::paginate(10);
        return view('livewire.admin.admin-categories',['scategories'=>$scategories,'scategoriesnumber'=>$scategoriesnumber,'featuredSCategories'=>$featuredSCategories,'unfeaturedSCategories'=>$unfeaturedSCategories])->layout('layouts.admin_base');
    }
}
