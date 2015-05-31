@extends('layouts.master')




@section('content')
<div class="col-md-6">
	<h3>Votes ~ edit</h3>
		
	<ul class="list-group">
		
			<li class="list-group-item">
				
				{{Form::model($vote,['method'=>'PATCH','route'=>['votes.update',$vote->id]])}}	<br>		
				{{Form::text('school_name')}}<br>
				{{Form::text('vote_title')}}<br>
				{{Form::text('vote_amount')}}<br>
				{{Form::text('start_at')}}<br>
				{{Form::text('end_at')}}<br>
				{{Form::text('vote_goal')}}<br>
				{{Form::text('can_select')}}<br>
				{{Form::text('builder_title')}}<br>
			 
				{{$vote->id}}<br>
				<input type="submit"  />
				{{ Form::close() }}
			</li>
		
	</ul>
</div>


@stop