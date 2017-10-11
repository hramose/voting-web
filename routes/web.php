<?php

use App\User;
use App\Position;
use App\Vote;
use Illuminate\Support\Facades\DB;


Route::get('/', function(){
	return redirect()->route('login');
});

Route::group(['prefix'=> 'auth'], function(){

	Route::get('/login', [
		'as'=> 'login',
		'uses'=> 'auth\AuthController@login'
	]);

	Route::post('/login', [
		'as'=> 'loginCheck',
		'uses'=> 'auth\AuthController@loginCheck'
	]);
});


Route::group(['prefix'=> 'admin'], function(){
	Route::get('/result', [
		'as'=> 'admin_result',
		'uses'=> 'admin\AdminController@admin_result'
	]);
		Route::post('/resultCheck', [
			'as'=> 'admin_result_check',
			'uses'=> 'admin\AdminController@admin_result_check'
		]);
	Route::get('/dash', [
		'as'=> 'admin_main',
		'uses'=> 'admin\AdminController@admin_main'
	]);
		Route::post('/new_admin', [
			'as'=> 'new_admin',
			'uses'=> 'admin\AdminController@new_admin'
		]);

		Route::get('/admin-backup', [
			'as'=> 'admin_backup',
			'uses'=> 'admin\AdminController@admin_backup'
		]);

	Route::get('/logout', [
		'as'=> 'logout',
		'uses'=> 'admin\AdminController@logout'
	]);

	Route::get('/system', [
		'as'=> 'system',
		'uses'=> 'admin\AdminController@system'
	]);
		Route::get('/backup', [
			'as'=> 'backup',
			'uses'=> 'admin\AdminController@backup'
		]);

		Route::get('/admin-delete/{id}', [
			'as'=> 'delete_admin',
			'uses'=> 'admin\AdminController@delete_admin'
		]);

	Route::get('/register', [
		'as'=> 'register',
		'uses'=> 'admin\AdminController@register'
	]);

		Route::post('/voter-search', [
			'as'=> 'admin_voter_search',
			'uses'=> 'admin\AdminController@admin_voter_search'
		]);

		Route::get('/voter-for-candidacy/{id}', [
			'as'=> 'admin_voter_for_candidacy',
			'uses'=> 'admin\AdminController@admin_voter_for_candidacy'
		]);

		Route::post('/voter-register-candidate/{id}', [
			'as'=> 'admin_register_candidate',
			'uses'=> 'admin\AdminController@admin_register_candidate'
		]);

		Route::post('/new_voters', [
			'as'=> 'new_voters',
			'uses'=> 'admin\AdminController@new_voters'
		]);

		Route::post('/new_candidates/{id}', [
			'as'=> 'new_candidates',
			'uses'=> 'admin\AdminController@new_candidates'
		]);

		Route::get('/voter-list', [
			'as'=> 'voter_list',
			'uses'=> 'admin\AdminController@voter_list'
		]);

		Route::get('/candidate-list', [
			'as'=> 'candidate_list',
			'uses'=> 'admin\AdminController@candidate_list'
		]);

		Route::get('/candidate-delete/{id}', [
			'as'=> 'candidate_delete',
			'uses'=> 'admin\AdminController@candidate_delete'
		]);

		Route::get('/voter-delete/{id}', [
			'as'=> 'voter_delete',
			'uses'=> 'admin\AdminController@voter_delete'
		]);

		Route::get('/voter-list-/edit/{id}', [
			'as'=> 'voter_edit',
			'uses'=> 'admin\AdminController@voter_edit'
		]);

		Route::post('/voter-list-update/{id}', [
			'as'=> 'voter_update_check',
			'uses'=> 'admin\AdminController@voter_update_check'
		]);

		Route::post('/voter-list-search', [
			'as'=> 'voter_list_search',
			'uses'=> 'admin\AdminController@voter_list_search'
		]);

		Route::post('/candidate-list-search', [
			'as'=> 'candidate_list_search',
			'uses'=> 'admin\AdminController@candidate_list_search'
		]);

	Route::get('/party', [
		'as'=> 'party',
		'uses'=> 'admin\AdminController@party'
	]);

		Route::post('/party', [
			'as'=> 'partyCheck',
			'uses'=> 'admin\AdminController@partyCheck'
		]);

		Route::get('/party/{id}', [
			'as'=> 'party_delete',
			'uses'=> 'admin\AdminController@party_delete'
		]);

		Route::get('/party/edit/{id}', [
			'as'=> 'party_edit',
			'uses'=> 'admin\AdminController@party_edit'
		]);

		Route::post('/party/editCheck/{id}', [
			'as'=> 'party_editCheck',
			'uses'=> 'admin\AdminController@party_editCheck'
		]);

	Route::get('/votes', [
		'as'=> 'votes',
		'uses'=> 'admin\AdminController@votes'
	]);

		Route::get('/candidates', [
			'as'=> 'candidates',
			'uses'=> 'admin\AdminController@candidates'
		]);

	Route::get('/party-list-candidate/{id}', [
		'as'=> 'admin_party_show_candidate',
		'uses'=> 'admin\AdminController@admin_party_show_candidate'
	]);		

	Route::post('/party-list-search', [
		'as'=> 'admin_party_list_search',
		'uses'=>  'admin\AdminController@admin_party_list_search'
	]);

	Route::get('/vote-history', [
		'as'=> 'admin_view_vote_history',
		'uses'=> 'admin\AdminController@admin_view_vote_history'
	]);

	Route::get('/voters-history/{id}', [
		'as'=> 'admin_view_voters_history',
		'uses'=> 'admin\AdminController@admin_view_voters_history'
	]);
});











Route::get('/addUser', function(){
	$user = new User;
$user->class_id = '123123';
$user->fname = 'Morls';
$user->mname = 'Abdul';
$user->lname = 'Karim';
$user->grade = '11';
$user->section = 'pineapple';
$user->email = 'email@yahoo.com';
$user->password = bcrypt('123123');
$user->role_id = 1;
$user->save();

});

Route::get('/addPosition', function(){
	$pos = new Position;
	$pos->position = 'Representative';
	$pos->save();
});