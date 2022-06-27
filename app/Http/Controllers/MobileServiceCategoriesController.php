<?php

namespace App\Http\Controllers;

use App\Models\ServiceCategory;
use Illuminate\Http\Request;

class MobileServiceCategoriesController extends Controller
{
    //get all service categories form database
    public function getServiceCategories()
    {
        return response([
            'categories'=> ServiceCategory::orderBy('created_at','desc')->where('featured',1)->get(),
        ],200);
    }

    //get details about a service category
    public function showServiceCategory($service_category_id)
    {
        //$service  = 
        return response([
            'category'=>ServiceCategory::where('id',$service_category_id)->get(),
        ],200);
    }
}
