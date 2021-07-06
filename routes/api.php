<?php

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

/*Route::middleware('auth:api')->get('/admin', function (Request $request) {
    return $request->user();
});*/
//all routes / api here must be api authenticated
//Route::group(['middleware' => ['api'/*,'checkPassword',*/,'changeLanguage'], 'namespace' => 'Api'], function () {
   // Route::post('get-main-categories', 'CategoriesController@index');
  //  Route::post('get-category-byId', 'CategoriesController@getCategoryById');
  //  Route::post('change-category-status', 'CategoriesController@changeStatus');    
//});

    Route::group(['prefix' => 'admin','namespace'=> 'App\Http\Controllers\Api\Marchand'],function (){
        Route::post('login', 'AuthController@login');

        Route::post('logout','AuthController@logout') -> middleware(['auth.guard:marchand-api']);
       // Route::post('get-personne-byCin','AuthController@getPersonneByCin') -> middleware(['auth.guard:marchand-api']);
       Route::get('get-personne-bycheque/{created_at}','AuthController@getPersonneByCheque') -> middleware(['auth.guard:marchand-api']);
       Route::post('reclamation','AuthController@reclamation') -> middleware(['auth.guard:marchand-api']);
         
        //invalidate token security side

         //broken access controller user enumeration
         Route::get('profile', 'AuthController@profile') -> middleware(['auth.guard:marchand-api']);
         Route::get('get-solde', 'AuthController@getSoldeMarchand') -> middleware(['auth.guard:marchand-api']);
         Route::get('add-achat/{chequeId}/{marchandId}/{montant}','AuthController@AddAchat') -> middleware(['auth.guard:marchand-api']);

    });

    Route::group(['prefix' => 'user','namespace'=>'User'],function (){
        Route::post('login','AuthController@Login') ;
    });


    Route::group(['prefix' => 'user' ,'middleware' => 'auth.guard:user-api'],function (){
       Route::post('profile',function(){
           return  \Auth::user(); // return authenticated user data
       }) ;


    });




Route::group(['middleware' => ['api','checkPassword','changeLanguage','checkAdminToken:admin-api'], 'namespace' => 'Api'], function () {
    Route::get('offers', 'CategoriesController@index');
});

