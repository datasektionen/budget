<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Defines the API routes as a REST-ful API.
|
*/
Route::get   ('committees',                       'ApiCommitteeController@all');
Route::post  ('committees',                       'ApiCommitteeController@create')     ->middleware('auth.pls:admin-committees');
Route::get   ('committees/{id}',                  'ApiCommitteeController@get');
Route::put   ('committees/{id}',                  'ApiCommitteeController@edit')       ->middleware('auth.pls:admin-committees');
Route::delete('committees/{id}',                  'ApiCommitteeController@delete')     ->middleware('auth.pls:admin-committees');

Route::get   ('committees/{id}/cost-centres',     'ApiCostCentreController@all');
Route::post  ('committees/{id}/cost-centres',     'ApiCostCentreController@create')    ->middleware('auth.pls:admin-cost-centres');
Route::get   ('cost-centres/{id}',                'ApiCostCentreController@get');
Route::put   ('cost-centres/{id}',                'ApiCostCentreController@edit')      ->middleware('auth.pls:admin-cost-centres');
Route::delete('cost-centres/{id}',                'ApiCostCentreController@delete')    ->middleware('auth.pls:admin-cost-centres');

Route::get   ('cost-centres/{id}/budget-lines',   'ApiBudgetLineController@all');
Route::post  ('cost-centres/{id}/budget-lines',   'ApiBudgetLineController@create');
Route::any   ('budget-lines',                     'ApiBudgetLineController@query');
Route::get   ('budget-lines/{id}',                'ApiBudgetLineController@get');
Route::put   ('budget-lines/{id}',                'ApiBudgetLineController@edit');
Route::post  ('budget-lines/{id}/accounts/{aid}', 'ApiBudgetLineController@addAccount')->middleware('auth.pls:admin-accounts');

Route::get   ('accounts',                         'ApiAccountController@all');
Route::get   ('accounts/{id}',                    'ApiAccountController@get');
Route::get   ('accounts/number/{number}',         'ApiAccountController@getByNumber');
Route::post  ('accounts',                         'ApiAccountController@create')       ->middleware('auth.pls:admin-accounts');
Route::put   ('accounts/{id}',                    'ApiAccountController@edit')         ->middleware('auth.pls:admin-accounts');

Route::delete('suggestions/{id}',                 'ApiSuggestionController@delete')    ->middleware('auth.pls:admin-suggestions');