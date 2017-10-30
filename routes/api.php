<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Defines the API routes as a REST-ish API.
|
*/
Route::get   ('committees',                       'ApiCommitteeController@all');
Route::post  ('committees',                       'ApiCommitteeController@create');
Route::get   ('committees/{id}',                  'ApiCommitteeController@get');
Route::put   ('committees/{id}',                  'ApiCommitteeController@edit');
Route::delete('committees/{id}',                  'ApiCommitteeController@delete');

Route::get   ('committees/{id}/cost-centres',     'ApiCostCentreController@all');
Route::post  ('committees/{id}/cost-centres',     'ApiCostCentreController@create');
Route::get   ('cost-centres/{id}',                'ApiCostCentreController@get');
Route::put   ('cost-centres/{id}',                'ApiCostCentreController@edit');
Route::delete('cost-centres/{id}',                'ApiCostCentreController@delete');

Route::get   ('cost-centres/{id}/budget-lines',   'ApiBudgetLineController@all');
Route::post  ('cost-centres/{id}/budget-lines',   'ApiBudgetLineController@create');
Route::get   ('budget-lines/{id}',                'ApiBudgetLineController@get');
Route::put   ('budget-lines/{id}',                'ApiBudgetLineController@edit');
Route::post  ('budget-lines/{id}/accounts/{aid}', 'ApiBudgetLineController@addAccount');

Route::get   ('accounts',                         'ApiAccountController@all');
Route::post  ('accounts',                         'ApiAccountController@create');
Route::get   ('accounts/{id}',                    'ApiAccountController@get');
Route::put   ('accounts/{id}',                    'ApiAccountController@edit');
Route::get   ('accounts/number/{number}',         'ApiAccountController@getByNumber');

Route::delete('suggestions/{id}', 'ApiSuggestionController@delete');