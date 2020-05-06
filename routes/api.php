<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// use App\Models\Bookable;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('bookables', function (Request $request) {
//     return Bookable::all();
// });

// Route::get('bookables/{id}', function (Request $request, $bookableId)
// {
//     //header need to accept application/json to laravel return json
//     return Bookable::findOrFail($bookableId);
// });

// Route::get('bookables', 'Api\BookableController@index');
// Route::get('bookables/{id}', 'Api\BookableController@show');

Route::apiResource('bookables', 'Api\BookableController')->only(['index', 'show']);
Route::get('bookables/{bookable}/availability', 'Api\BookableAvailabilityController')
    ->name('bookables.availability.show');
Route::get('bookables/{bookable}/reviews', 'Api\BookableReviewController')
    ->name('bookables.reviews.index');