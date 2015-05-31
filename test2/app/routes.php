<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/



Route::get('/', ['as' => 'home', 'uses' => 'VoteController@index']);
Route::get('/insert-first', array('as' => 'vote.insert-first', function() 
    {
        $votes = Vote::get();
        // return our view and Vote information
        return View::make('tasks.vote-insert-first', compact('votes'));
    }));
Route::get('/insert-second', array('as' => 'vote.insert-second', function() 
    {
        $votes = Vote::get();
        // return our view and Vote information
        return View::make('tasks.vote-insert-second', compact('votes'));
    }));
// Route::get('t', 'CandidateController@create');
// Route::get('t2',  'CandidateController@store_a');

Route::get('excel', ['as' => 'import_cadidates', 'uses' => 'CandidateController@create']);
Route::get('excel_value', ['as' => 'import_cadidates_value', 'uses' => 'CandidateController@create']);
Route::get('store_a', ['as' => 'store_cadidates', 'uses' => 'CandidateController@store_a']);
Route::post('file_import', ['as' => 'file_import', 'uses' => 'CandidateController@file_move']);
Route::get('candidates_index', ['as' => 'cadidates', 'uses' => 'CandidateController@index']);
//Route::get('/', ['as' => 'home']);
Route::get('/{id}', array('as' => 'vote.edit', function($id) 
    {
        // return our view and Vote information
        return View::make('tasks.vote-edit') // pulls app/views/nerd-edit.blade.php
            ->with('vote', Vote::find($id));
    }))->where('id','[0-9]+');

Route::get('/manage', array('as' => 'manage', function() 
    {
        $votes = Vote::get();
        // return our view and Vote information
        return View::make('tasks.vote-manage-index',compact('votes'));
    }));

Route::get('/{id}/{s}', array('as' => 'vote.edit2', function($id,$s) 
    {
        // return our view and Vote information
        // return View::make('tasks.vote-edit') // pulls app/views/nerd-edit.blade.php
        //     ->with('vote', Vote::find($id));

         return View::make('tasks.vote-edit2', array('id' => $id,'s'=>$s,'vote'=>Vote::find($id)));
    }));


Route::delete('/api/todos/clean', 'TodoController@clean');
Route::resource('/api/todos', 'TodoController');
// Route::controller('/api/todos', 'TodoController');

Route::resource('/api/users', 'UserController');
Route::delete('/api/users/clean', 'UserController@clean');

Route::resource('/api/votes', 'VoteController');
Route::delete('/api/votes/clean', 'VoteController@clean');

Route::resource('votes', 'VoteController');
Route::resource('candidates', 'CandidateController');

