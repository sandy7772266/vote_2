<?php

class VoteController extends \BaseController {

	
// public function index()
// 	{		
// 		$tasks = Task::with('user')->orderby('completed')->orderby('completed', 'desc')->orderby('created_at', 'desc')->get();
// 		$users = User::orderby('name')->lists('name', 'id');
		
		
// 		return View::make('tasks.index', compact('tasks', 'users'));	
// 	}


// *
// 	 * Display a listing of the resource.
// 	 *
// 	 * @return Response
	 
// 	public function index()
// 	{
// 		return Response::json(Vote::all());
// 	}





	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//$votes = Response::json(Vote::all());

		$votes = Vote::get();

		return View::make('tasks.index', compact('votes'));	
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */


	public function store()
	{
		//
		$data = Input::all();
		$vote = new Vote;
		$vote->school_name=$data['school_no'];
		$vote->school_name=$data['school_name'];
		$vote->vote_title=$data['vote_title'];
		$vote->vote_amount=$data['vote_amount'];
		$vote->start_at=$data['start_at'];
		$vote->end_at=$data['end_at'];
		$vote->vote_goal=$data['vote_goal'];
		$vote->can_select=$data['can_select'];
		$vote->builder_name=$data['builder_name'];
		$vote->save();

		$arr=[
			'vote' => $vote,
			'flash' => ['type'=>'success','msg' => '新增成功！']
		];

		$vote_new = DB::table('votes')
                    ->orderBy('id', 'desc')
                    //->groupBy('count')
                    //->having('count', '>', 100)
                    ->get();

		$vote_id = $vote_new[0]->id;
		//$this->passsec($vote_id);	
		Session::put('vote_id_insert', $vote_id);                
		return Redirect::route('vote.insert-second');	
		//Redirect::action('VoteController@passsec', ['id' => $vote_id]);
	}
    //修改部分 end

public function passsec()
	{
		$vote_id = Input::get('vote_id');
		//echo "oo";
		Session::put('vote_id_insert', $vote_id);                

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return 'hello';
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */

		//修改部分
	public function update($id)
	{
		//$data = Input::get();
		$vote = Vote::find($id);

		$vote -> fill(Input::all());
		


		// if(isset($data['vote_title'])){
		// 	$vote->vote_title = $data['vote_title'];

			//return Response::json($vote);
		

		// if(isset($data['done'])){
		// 	$todo->done = $data['done'];
		// }

		$vote->save();

		$arr = [
			'flash' => ['type' => 'success',
						'msg' => '更新成功！']
		];

		//return Redirect::to('/');
		return Redirect::route('manage');
	}
    //修改部分 end

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
		$vote = Vote::find($id);
		$vote->delete();

		$arr = [
			'flash' => ['type' => 'success',
						'msg' => '待辦事項已刪除！']
		];

		return Redirect::route('manage');
	}


public function update2($id)
	{
		$arr = 'o';
		return Response::json($arr);
	}
    //修改部分 end

}
