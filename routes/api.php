<?php

use Illuminate\Http\Request;

Route::group(['prefix'=> 'v1'], function(){

	Route::post('/user', 'api\UserController@login');

	Route::get('/party', 'api\UserController@party');

	Route::get('/candidate', 'api\UserController@candidate');

	Route::resource('/partylist','api\CandidateController');
});