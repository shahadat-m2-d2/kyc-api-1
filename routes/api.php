<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\kycAPIController;

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

Route::get("countries/{id?}",[kycAPIController::class,"countries"]);
Route::get("roles/{id?}",[kycAPIController::class,"roles"]);
Route::get("contact_type/{id?}",[kycAPIController::class,"contact_type"]);
Route::get("useraddress/{id?}",[kycAPIController::class,"useraddress"]);
Route::get("organisationcontact/{id?}",[kycAPIController::class,"organisationcontact"]);

Route::get("organisationaddress/{id?}",[kycAPIController::class,"organisationaddress"]);


Route::get("addresstype/{id?}",[kycAPIController::class,"addresstype"]);
Route::post("addresstype",[kycAPIController::class,"add_addresstype"]);
Route::put("addresstype",[kycAPIController::class,"update_addresstype"]);
Route::delete("addresstype/{id?}",[kycAPIController::class,"delete_addresstype"]);

Route::get("organisation/{id?}",[kycAPIController::class,"organisation"]);
Route::post("organisation",[kycAPIController::class,"add_organisation"]);
Route::put("organisation",[kycAPIController::class,"update_organisation"]);
Route::delete("organisation/{id?}",[kycAPIController::class,"delete_organisation"]);

Route::get("user",[kycAPIController::class,"kyc_user"]);
Route::get("user/{id?}",[kycAPIController::class,"kyc_user"]);
Route::post("user",[kycAPIController::class,"add_user"]);
Route::put("user",[kycAPIController::class,"update_user"]);
Route::delete("user/{id?}",[kycAPIController::class,"delete_user"]);

Route::get("actor/{id?}",[kycAPIController::class,"actor"]);
Route::get("actor/findByStatus/{id?}",[kycAPIController::class,"actor_findByStatus"]);
Route::post("actor",[kycAPIController::class,"add_actor"]);
Route::delete("actor/{id?}",[kycAPIController::class,"delete_actor"]);
Route::put("actor",[kycAPIController::class,"update_actor"]);

Route::get("actortype/{id?}",[kycAPIController::class,"actortype"]);
Route::post("actortype",[kycAPIController::class,"add_actortype"]);
Route::delete("actortype/{id?}",[kycAPIController::class,"delete_actortype"]);
Route::put("actortype",[kycAPIController::class,"update_actortype"]);


Route::get("actorcontact/{id?}",[kycAPIController::class,"actorcontact"]);
Route::get("actorcontact/search/{id?}",[kycAPIController::class,"actorcontact_search"]);
Route::post("actorcontact",[kycAPIController::class,"add_actorcontact"]);
Route::put("actorcontact",[kycAPIController::class,"update_actorcontact"]);
Route::delete("actorcontact/{id?}",[kycAPIController::class,"delete_actorcontact"]);


Route::get("actoraddress/{id?}",[kycAPIController::class,"actoraddress"]);
Route::get("actoraddress/search/{id?}",[kycAPIController::class,"actoraddress_search"]);
Route::post("actoraddress",[kycAPIController::class,"add_actoraddress"]);
Route::put("actoraddress",[kycAPIController::class,"update_actoraddress"]);
Route::delete("actoraddress/{id?}",[kycAPIController::class,"delete_actoraddress"]);