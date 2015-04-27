@extends('layouts.master')




@section('content')
<div class="col-md-6">
	<h3>Votes ~ edit</h3>
		
	<ul class="list-group">
		
			<li class="list-group-item">
				
				{{Form::model($vote,['method'=>'PATCH','route'=>['votes.update',$vote->id]])}}			
				{{Form::text('school_name')}}
				{{Form::text('vote_title')}}
				{{Form::text('vote_amount')}}
				{{Form::text('start_at')}}
				{{Form::text('end_at')}}
				{{Form::text('vote_goal')}}
				{{Form::text('can_select')}}
				{{Form::text('builder_title')}}
			 
				{{$vote->id}}
				<input type="submit"  />
				{{ Form::close() }}
			</li>
		
	</ul>
</div>


@stop