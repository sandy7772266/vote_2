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

Route::get('/openid', function()
{
    return View::make('hello');
});

Route::get('login/openid', 'AuthController@openIDLogin');
Route::get('logout/openid', 'AuthController@openIDLogout');
Route::get('user/data/show', 'AuthController@showUserData');


Route::get('/insert-first', array('as' => 'vote.insert-first', function() 
    {
        $votes = Vote::get();
        // return our view and Vote information
        return View::make('tasks.vote-insert-first', compact('votes'));
    }));
Route::get('/insert-second/{id}', array('as' => 'vote.insert-second', function($id) 
    {
        //$votes = Vote::get();
        // return our view and Vote information
        Session::put('vote_id_insert', $id);
        return View::make('tasks.vote-insert-second');
    }));
// Route::get('t', 'CandidateController@create');
// Route::get('t2',  'CandidateController@store_a');

Route::get('excel', ['as' => 'import_cadidates', 'uses' => 'CandidateController@create']);
Route::get('excel_value', ['as' => 'import_cadidates_value', 'uses' => 'CandidateController@create']);
Route::get('store_a', ['as' => 'store_cadidates', 'uses' => 'CandidateController@store_a']);
//Route::get('/passsec/', ['as' => 'passsec', 'uses' => 'VoteController@passsec']);
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
        $ary[0] = $votes;
        foreach ($ary[0] as $vote){
           // $candidate = Candidate::find($vote->id);
            $candidate_c = Candidate::where('vote_id', '=', $vote->id)->first();
            if ($candidate_c <> null){
                $ary[1][$vote->id] = $candidate_c->vote_id;
            }
            else{
                $ary[1][$vote->id] = '沒有資料';
            }
        }
        // return our view and Vote information
        return View::make('tasks.vote-manage-index',compact('ary'));
    }));

Route::get('/candidate_data_show/{id}', array('as' => 'candidate_data_show', function($id) 
    {
        $candidates = Candidate::where('vote_id', '=', $id)->get();
       
        // return our view and Vote information
        return View::make('tasks.candidate_data_show',compact('candidates'));
    }));

// Route::get('/{id}/{s}', array('as' => 'vote.edit2', function($id,$s) 
//     {
//         // return our view and Vote information
//         // return View::make('tasks.vote-edit') // pulls app/views/nerd-edit.blade.php
//         //     ->with('vote', Vote::find($id));

//          return View::make('tasks.vote-edit2', array('id' => $id,'s'=>$s,'vote'=>Vote::find($id)));
//     }));


Route::get('/test', function()
{
    // $artist = new Artist;
    // $artist->name = 'Eve 6';
    // $artist->save();


                    // $candidate = new Candidate;
                    // $candidate->cname=$data_array1[0];
                    // $candidate->job_title=$data_array1[1];
                    // $candidate->sex=$data_array1[2];
                    // $candidate->vote_id=42;
                    // $candidate->total_count=0;
                    
                    // $account = new Account;
                    // $account->username;
                    // $account->vote_id;
                    // $account->finish_at;

    $vote = Vote::find(2);

    $account = new Account;
    $account->username='sandy';
    $account->vote_id=2;
    $account->finish_at="0000-00-00 00:00:00";
    $account->vote()->associate($vote);
    $account->save();

    $account2 = new Account;
    $account2->username='sandy2';
    $account2->vote_id=2;
    $account2->finish_at="0000-00-00 00:00:00";
    $account2->vote()->associate($vote);
    $account2->save();

    $candidate = new Candidate;
    $candidate->cname = 'Naruto Uzumaki';
    $candidate->job_title='yy';
    $candidate->sex='男';
    $candidate->vote_id=2;
    $candidate->total_count=2;

    $candidate->save();
    $candidate->accounts()->save($account);
    $candidate->accounts()->save($account2);

    // return $candidate->accounts;
    return Candidate::with('accounts')->find($candidate->id);

   
});


Route::delete('/api/todos/clean', 'TodoController@clean');
Route::resource('/api/todos', 'TodoController');
// Route::controller('/api/todos', 'TodoController');

Route::resource('/api/users', 'UserController');
Route::delete('/api/users/clean', 'UserController@clean');

Route::resource('/api/votes', 'VoteController');
Route::delete('/api/votes/clean', 'VoteController@clean');

Route::resource('votes', 'VoteController');
Route::resource('candidates', 'CandidateController');

