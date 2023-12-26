<?php
// admin controller
  use Illuminate\Support\Facades\Route;
  use App\Http\Controllers\Admin\HomeController;
  use App\Http\Controllers\Admin\Auth\LoginController;
  use App\Http\Controllers\Admin\CityController;
  use App\Http\Controllers\Admin\ReviewController;
  use App\Http\Controllers\Admin\UserController;
  use App\Http\Controllers\Admin\TripController;
  use App\Http\Controllers\Admin\AdvertisingController;
  use App\Http\Controllers\Admin\AboutUsController;
  use App\Http\Controllers\Admin\BookingController;


  // provider controller
  use App\Http\Controllers\Provider\Auth\LoginProviderController;
  use App\Http\Controllers\Provider\ProviderController;
  use App\Http\Controllers\Provider\ProviderTripController;
  use App\Http\Controllers\Provider\ProviderTicketCentersController;
  use App\Http\Controllers\Provider\ProviderBookingController;
  use App\Http\Controllers\Provider\ProviderManagerController;
  use App\Http\Controllers\Provider\ProviderSettingController;
  use App\Http\Controllers\Provider\ProviderReportController;
  use App\Http\Controllers\Provider\ProviderNotificationController;
  
// end admin controller 
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


Route::namespace("Admin")->prefix('admin')->group(function(){
    Route::get('/home',[HomeController::class,'index']);
  
    Route::namespace('Auth')->group(function(){
      Route::get('/login',[LoginController::class,'showLoginForm'])->name('admin.login');
      Route::post('/login',[LoginController::class,'login']);
      Route::post('/logout',[LoginController::class,'logout'])->name('admin.logout');
    });

      // users 
        Route::get('/allUser',[UserController::class,'allUser']);
      //users
      // providers 
        Route::get('/providers',[UserController::class,'providers']);
        Route::get('/requestProviders',[UserController::class,'requestProviders']);
        Route::get('/acceptProvider/{com_id}',[UserController::class,'acceptProvider']);
        Route::get('/blocked',[UserController::class,'blocked']);
        Route::get('/blockProvider/{com_id}',[UserController::class,'blockProvider']);
      //providers  
      // start city 
        Route::get('/allCity',[CityController::class,'allCity']);
        Route::post('/deleteCity',[CityController::class,'deleteCity']);
        Route::post('/storeCity',[CityController::class,'storeCity']);
        Route::post('/updateCity/{city_id}',[CityController::class,'updateCity']);
      //end city 
      // start trip 
        Route::get('/allTrips',[TripController::class,'allTrips']);
        Route::post('/storeTrip',[TripController::class,'storeTrip']);
        Route::post('/updateTrip',[TripController::class,'updateTrip']);
        Route::post('/deleteTrip',[TripController::class,'deleteTrip']);
      //end trip 
      //advertising
        Route::get('/advertisings',[AdvertisingController::class,'advertisings']);
        Route::post('/storeAd',[AdvertisingController::class,'storeAd']);
        Route::post('/deleteAd/{ad_id}',[AdvertisingController::class,'deleteAd']);
      //advertising
      // about us &privacy &term
        Route::get('/aboutUs',[AboutUsController::class,'aboutUs']);
        Route::post('/updateAboutUs',[AboutUsController::class,'updateAboutUs']);
        Route::get('/privacy',[AboutUsController::class,'privacy']);
        Route::post('/updatePrivacy',[AboutUsController::class,'updatePrivacy']);

      //about us &privacy &term 
      
      // booking 
        Route::get('/newCompanyBooking',[BookingController::class,'newCompanyBooking']);
        Route::get('/oldCompanyBooking',[BookingController::class,'oldCompanyBooking']);
        Route::get('/companyBookingDetails/{company_id}',[BookingController::class,'companyBookingDetails']);
        Route::get('/oldCompanyBookingDetails/{company_id}',[BookingController::class,'oldCompanyBookingDetails']);
        Route::post('/tripDetails',[BookingController::class,'tripDetails']);
      //booking 
      // start Reviews
        Route::get('/reviews',[ReviewController::class,'reviews']);
        Route::get('/deleteReview/{city_id}',[ReviewController::class,'deleteReview']);
        Route::get('/changeStatus/{city_id}',[ReviewController::class,'changeStatus']);
      //end Reviews 
});
Route::get('/change-language/{locale}', function ($locale) {
  App::setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
});
Route::name('provider.')->namespace('Provider')->prefix('provider')->group(function(){

  // Route::namespace('Auth')->middleware('guest:provider')->group(function(){
    Route::get('/login',[LoginProviderController::class,'showLoginForm'])->name('provider.login');
    Route::post('/login',[LoginProviderController::class,'login']);
    Route::post('/providerlogout',[LoginProviderController::class,'logout'])->name('provider.logout');
  // });
  //home & profile
    Route::get('/index',[ProviderController::class,'index'])->name('provider.home');
    Route::get('/myProfile',[ProviderController::class,'myProfile']);
  //home & profile
  // trips profile
    Route::get('/myTrips',[ProviderTripController::class,'myTrips']);
    Route::post('/storeProviderTrip',[ProviderTripController::class,'storeProviderTrip']);
    Route::post('/updateTrip',[ProviderTripController::class,'updateTrip']);
    Route::post('/deleteTrip',[ProviderTripController::class,'deleteTrip']);

    Route::get('/tripsPrice',[ProviderTripController::class,'tripsPrice']);
    Route::post('/priceAdjustment',[ProviderTripController::class,'priceAdjustment']);
  //trips 

  // ticketCenters
    Route::get('/ticketCenters',[ProviderTicketCentersController::class,'ticketCenters']);
    Route::post('/addCenter',[ProviderTicketCentersController::class,'addCenter']);
    Route::post('/updateCenter',[ProviderTicketCentersController::class,'updateCenter']);
    Route::post('/deleteCenter',[ProviderTicketCentersController::class,'deleteCenter']);
  // ticketCenters 

  // booking 
    Route::get('/myNewBooking',[ProviderBookingController::class,'myNewBooking']);
    Route::get('/myOldBooking',[ProviderBookingController::class,'myOldBooking']);
    Route::post('/tripDetails',[ProviderBookingController::class,'tripDetails']);
  // booking 
  //managers
    Route::get('/managers',[ProviderManagerController::class,'managers']);
    Route::post('/addManager',[ProviderManagerController::class,'addManager']);
    Route::post('/updateManager',[ProviderManagerController::class,'updateManager']);
    Route::post('/deleteManager',[ProviderManagerController::class,'deleteManager']);
  //managers 
  // financial Reports
    Route::get('/financialReports',[ProviderReportController::class,'Reports']);
    Route::post('/detailsReport',[ProviderReportController::class,'detailsReport']);
    Route::post('/filterReport',[ProviderReportController::class,'filterReport']);
  //financial Reports 
  // notifications
    Route::get('/notifications',[ProviderNotificationController::class,'notifications']);
  // notifications

});