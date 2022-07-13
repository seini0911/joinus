<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;

class MobileServiceController extends Controller
{
    
    //get all featured services to display on home page 
    public function getServices()
    {
        return response([
            'services' =>Service::orderBy('created_at','desc')->where('featured',1)->get(),
        ], 200);
    }

    //get a service from its id and display in detail page
    public function showService($service_id)
    {
        return response([
            'service'=>Service::where('id',$service_id)->get(),
        ],200);
    }

    //get service category of a service
    public function getServiceCategory($service_id)
    {   
        //get the service then the category
        $service = Service::where('id',$service_id)->get();
        $service_category_id = $service->service_category_id;
        return response([
            'service_category'=> ServiceCategory::where('id',$service_category_id)->get(),
        ],200);

    }
    
    //create a service by a service provider
    public function createService()
    {

    }

    //update a service by a service provider
    public function updateService(Request $request, $service_id)
    {
    }


}

