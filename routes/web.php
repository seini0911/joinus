<?php

use App\Http\Controllers\SearchController;
use App\Http\Livewire\Admin\AdminAddServiceCategoryComponent;
use App\Http\Livewire\Admin\AdminAddServiceComponent;
use App\Http\Livewire\Admin\AdminAddSlideComponent;
use App\Http\Livewire\Admin\AdminAllClients;
use App\Http\Livewire\Admin\AdminAllProviders;
use App\Http\Livewire\Admin\AdminAllSubscriptions;
use App\Http\Livewire\Admin\AdminAllTransactions;
use App\Http\Livewire\HomeComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminEditServiceCategoryComponent;
use App\Http\Livewire\Admin\AdminEditServiceComponent;
use App\Http\Livewire\Admin\AdminEditSlideComponent;
use App\Http\Livewire\Admin\AdminProfileSettings;
use App\Http\Livewire\Admin\AdminServiceCategoryComponent;
use App\Http\Livewire\Admin\AdminServicesByCategoryComponent;
use App\Http\Livewire\Admin\AdminServicesComponent;
use App\Http\Livewire\Admin\AdminSliderComponent;
use App\Http\Livewire\Customer\CustomerDashboardComponent;
use App\Http\Livewire\ServiceCategoriesComponent;
use App\Http\Livewire\ServiceDetailsComponent;
use App\Http\Livewire\ServicesByCategoryComponent;
use App\Http\Livewire\Sprovider\SproviderDashboardComponent;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});
*/

// For all users or visitors of the website
Route::get('/', HomeComponent::class)->name('home');
Route::get('/service-categories', ServiceCategoriesComponent::class)->name('home.service_categories');
Route::get('/{category_slug}/services',ServicesByCategoryComponent::class)->name('home.services_by_category');
Route::get('/service/{service_slug}',ServiceDetailsComponent::class)->name('home.service_details');
Route::get('/autocomplete', [SearchController::class,'autoComplete'])->name('autocomplete');
Route::post('/search',[SearchController::class,'searchService'])->name('searchService');

//Function to get all the service providers of a service
//Route::post('/service/{service_id}/providers',[SearchController::class,'searchService'])->name('searchService');

//For customer
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/customer/dashboard', CustomerDashboardComponent::class)->name('customer.dashboard');
});

//For service provider
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'authsprovider',
])->group(function () {
    Route::get('/sprovider/dashboard', SproviderDashboardComponent::class)->name('sprovider.dashboard');
});

//For admin
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'authadmin',
])->group(function () {
    //main routes for services and categories
    Route::get('/admin/dashboard', AdminDashboardComponent::class)->name('admin.dashboard');
    Route::get('/admin/service-categories', AdminServiceCategoryComponent::class)->name('admin.service_categories');
    Route::get('/admin/service-category/add', AdminAddServiceCategoryComponent::class)->name('admin.add_service_category');
    Route::get('/admin/service-category/edit/{category_id}', AdminEditServiceCategoryComponent::class)->name('admin.edit_service_category');
    Route::get('/admin/all-services', AdminServicesComponent::class)->name('admin.all_services');
    Route::get('/admin/{category_slug}/services',AdminServicesByCategoryComponent::class)->name('admin.services_by_category');
    Route::get('/admin/service/add',AdminAddServiceComponent::class)->name('admin.add_service');
    Route::get('/admin/service/edit/{service_slug}', AdminEditServiceComponent::class)->name('admin.edit_service');
    

    //getting all providers
    Route::get('/admin/all/providers',AdminAllProviders::class)->name('admin.all_sproviders');
    
    //getting all clients/customers
    Route::get('/admin/all/clients', AdminAllClients::class)->name('admin.all_clients');

    //getting all transactions
    Route::get('/admin/all/transactions', AdminAllTransactions::class)->name('admin.all_transactions');

    //all subscriptions
    Route::get('/admin/all/subscriptions', AdminAllSubscriptions::class)->name('admin.all_subscriptions');

    //profile setting
    Route::get('/admin/profile/setting', AdminProfileSettings::class)->name('admin.profile');

    Route::get('/admin/slider', AdminSliderComponent::class)->name('admin.slider');
    Route::get('/admin/slide/add',AdminAddSlideComponent::class)->name('admin.add_slide');
    Route::get('/admin/slide/edit/{slide_id}',AdminEditSlideComponent::class)->name('admin.edit_slide');
});
