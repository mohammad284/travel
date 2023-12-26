<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ReviewController;
use App\Http\Controllers\Api\AdvertisingController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\TripController;
use App\Http\Controllers\Api\BookingController;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([ 'middleware' => 'api' , 'prefix' => 'auth' ] , function() {
    Route::post('/register' , [AuthController::class , 'register']);
    Route::post('/login' , [AuthController::class , 'login']);
    Route::post('/logout' , [AuthController::class , 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
});

// review
    Route::get('/addReview',[ReviewController::class,'addReview']);
//review
// advertising
    Route::get('/advertising',[AdvertisingController::class,'advertising']);
//advertising

// companies
    Route::get('/companies',[UserController::class,'companies']);
//companies
// trips
    Route::post('/companyCities',[TripController::class,'companyCities']);
    Route::post('/companyTrips',[TripController::class,'companyTrips']);
//trips 
// Booking
    Route::post('/bookTrip',[BookingController::class,'bookTrip']);
    Route::post('/myBooking',[BookingController::class,'myBooking']);
//Booking 