<?php

class CandidateController_value extends \BaseController {

	
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
		//return Response::json(Candidate::all());
		//return View::make('tasks.index', compact('votes'));	
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		$value = null;		
	 
		 Excel::load(storage_path().'/001.xls', function($reader) use (&$value) {
         //$result = $reader->get();
         $value = $reader->get()->toArray();//object -> array
        // $result = $result[1];
        // $result = $result[0];
        //Session::put('data_s', $result);
 		
        //return var_dump($value);
        //return Redirect::action('CandidateController@index');
        //return Redirect::to('store_a');


    	});
		// $value = Session::get('data_s');
		//return Redirect::to('store_a');
		 return Redirect::action('CandidateController_use_value@store_a', ['data' => $value]);
	}


	// public function create()
	// {
 //    $value = null;		
	 
 //    Excel::load(storage_path().'/001.xls', function($reader) use ($value){
    
 //        $value = $reader->get()->toArray();//object -> array
 //        //Session::put('data_s', $result);
 		
 //      	});
	// 	 //$value = Session::get('data_s');
		
	// 	 return Redirect::action('CandidateController@store_a', ['data' => $value]);
	// }


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */


	public function store_a()
	{		
		      //$value = Session::get('data_s');
		      $user_data = Input::get('data');
		     // $data = "test";
		      return var_dump($user_data);

		  //            foreach ($data as $data_array1) {
			 		

				
				// 	$candidate = new Candidate;
				// 	$candidate->cname=$data_array1[0];
				// 	$candidate->job_title=$data_array1[1];
				// 	$candidate->sex=$data_array1[2];
				// 	$candidate->vote_id=42;
				// 	$candidate->total_count=0;
				// 	$candidate->save();
				// }

		      //$this->mydd(user_data);
	}
    //修改部分 end

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */


	public function mydd($data){
		
		echo "<pre>";
		var_dump($data);
		echo "tt";
		echo "</pre>";
	}


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
