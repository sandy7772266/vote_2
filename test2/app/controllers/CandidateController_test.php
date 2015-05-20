<?php

class VoteController extends BaseController {

	
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

		$candidates = Candidate::get();

		return View::make('tasks.index_candidates', compact('candidates'));	
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//

		Excel::load(storage_path().'/001.xls', function($reader) {
         //$result = $reader->get();
        $result = $reader->get()->toArray();//object -> array
        // $result = $result[1];
        // $result = $result[0];

        return var_dump($result);
        //return Redirect::action('CandidateController@store', ['data' => $result]);

 //        foreach ($data as $data_array1) {
			 		

				
	// 				$candidate = new Candidate;
	// 				$candidate->c_name=$data_array1[0];
	// 				$candidate->job_title=$data_array1[1];
	// 				$candidate->sex=$data_array1[2];
	// 				$candidate->vote_id=42;
	// 				$candidate->total_count=0;
	// 				$candidate->save();


	// }


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */


	private function store()
	{
		//
		// $data = Input::all();

		foreach ($data as $data_array1) {
			 		

				
					$candidate = new Candidate;
					$candidate->c_name=$data_array1[0];
					$candidate->job_title=$data_array1[1];
					$candidate->sex=$data_array1[2];
					$candidate->vote_id=42;
					$candidate->total_count=0;
					$candidate->save();

		    

		}

		$arr=[
			'vote' => $vote,
			'flash' => ['type'=>'success','msg' => '新增成功！']
		];

		return Redirect::to('http://10.231.87.225:81/new_vote/test2/public/');		
	}
    //修改部分 end

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
		return Redirect::route('home');
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

		return Redirect::route('home');
	}


public function update2($id)
	{
		$arr = 'o';
		return Response::json($arr);
	}
    //修改部分 end

}
