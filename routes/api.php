<?php

use App\Http\Controllers\MobileAuthController;
use App\Http\Controllers\MobileServiceCategoriesController;
use App\Http\Controllers\MobileServiceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/register',[MobileAuthController::class,'register']);
Route::post('/login',[MobileAuthController::class,'login']);
Route::get('/categories',[MobileServiceCategoriesController::class,'getServiceCategories']); //get all services categories to display on the carousel of the app
Route::get('/services',[MobileServiceController::class,'getServices']); //get all services to display on the home page


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//protected routes
Route::group(['middleware'=>['auth:sanctum']], function(){
    
    //get user details after login
    Route::post('/user',[MobileAuthController::class,'show']);

    //user login route from mobile app
    //Route::post('/login',[MobileAuthController::class,'login']);

    //logged in user operations
    Route::get('/services',[MobileServiceController::class,'getServices']); //get all services to display on the home page
    Route::get('/service/{service_id}',[MobileServiceController::class,'showService']); //get a specific service when clicked from the homepage
    Route::get('/categories',[MobileServiceCategoriesController::class,'getServiceCategories']); //get all services categories to display on the carousel of the app
    Route::get('/service/category/{service_id}',[MobileServiceController::class,'getServiceCategory']); //gets a service category from the service's id
    

    // Operations related to transactions made between the customer and the service provider for a given service
    //Route::get()
    //logged in service provider operations
    Route::post('/service/add',[MobileServiceController::class,'addService']); //adding a service by a service provider
    Route::put('/service/update/{service_id}',[MobileServiceController::class,'updateService']); //updating a service by a service provider
    Route::delete('/service/delete/{service_id}',[MobileServiceController::class,'deleteService']); //delete a service by a service provider

});

