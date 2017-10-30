<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Non-api routes.
|
*/

Route::get ('/',               'GeneralController@getWelcome');
Route::get ('/fuzzyfile',      'GeneralController@getFuzzyfile');

Route::get('/committees/{id}', 'BudgetController@getCommittee');
Route::get('/overview',        'BudgetController@getOverview');

Route::get ('/follow-up', 'FollowUpController@getIndex');
Route::post('/follow-up', 'FollowUpController@postImport');
Route::get ('/follow-up/{id}', 'FollowUpController@getShow');
Route::get ('/follow-up/{id}/committees/{committeeId}', 'FollowUpController@getShowCommittee');

Route::get ('/suggestions', 'SuggestionController@getList')->middleware('auth');
Route::get ('/suggestions/new', 'SuggestionController@getNew')->middleware('auth');
Route::post('/suggestions/new', 'SuggestionController@postNew')->middleware('auth');
Route::get ('/suggestions/{id}', 'SuggestionController@getShow')->middleware('auth');
Route::get ('/suggestions/{id}/share', 'SuggestionController@getShare')->middleware('auth');
Route::post('/suggestions/{id}/share', 'SuggestionController@postShare')->middleware('auth');
Route::get ('/suggestions/{id}/edit', 'SuggestionController@getEdit')->middleware('auth');
Route::get ('/suggestions/{id}/done', 'SuggestionController@getDone')->middleware('auth');
Route::get ('/suggestions/{id}/implement', 'SuggestionController@getImplement')->middleware('auth');
Route::get ('/suggestions/{id}/publish', 'SuggestionController@getPublish')->middleware('auth');
Route::get ('/suggestions/{id}/pdf', 'SuggestionController@getPdf')->middleware('auth');

/*
| Authentication
*/
Route::get('login', 'AuthController@getLogin')->middleware('guest');
Route::get('login-complete/{token}', 'AuthController@getLoginComplete');
Route::get('logout', 'AuthController@getLogout')->middleware('auth');

/*
| Admin routes
*/
Route::get ('/admin', 'AdminController@getIndex')->middleware('admin');

Route::get ('/admin/suggestions', 'AdminController@getSuggestions')->middleware('admin');

Route::get ('/admin/committees', 'AdminController@getCommitteesList')->middleware('admin');
Route::get ('/admin/committees/{id}/edit', 'AdminController@getCommitteesEdit')->middleware('admin');
Route::post('/admin/committees/{id}/edit', 'AdminController@postCommitteesEdit')->middleware('admin');
Route::get ('/admin/committees/new', 'AdminController@getCommitteesNew')->middleware('admin');
Route::post('/admin/committees/new', 'AdminController@postCommitteesNew')->middleware('admin');

Route::get ('/admin/accounts', 'AdminController@getAccountsList')->middleware('admin');
Route::get ('/admin/accounts/{id}/edit', 'AdminController@getAccountsEdit')->middleware('admin');
Route::post('/admin/accounts/{id}/edit', 'AdminController@postAccountsEdit')->middleware('admin');
Route::get ('/admin/accounts/new', 'AdminController@getAccountsNew')->middleware('admin');
Route::post('/admin/accounts/new', 'AdminController@postAccountsNew')->middleware('admin');
Route::get ('/admin/accounts/{id}/budget-lines', 'AdminController@getAccountsBudgetLines')->middleware('admin');

Route::get ('/admin/events', 'AdminController@getEvents')->middleware('admin');


