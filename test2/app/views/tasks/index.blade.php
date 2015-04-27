@extends('layouts.master')




@section('content')
<div class="col-md-6">
	<h3>All Votes ~ title</h3>
		
	<ul class="list-group">
		@foreach ($votes as $vote)
			<li class="list-group-item">
				
				


				<a href="{{ url('/', array($vote->id), false) }}"><strong>{{ $vote->vote_title }}</strong></a>
				<!-- {{Form::model($vote,array('route'=>array('votes.update',$vote->id)))}}			

				{{Form::text('vote_title')}}

				<input type="submit"  />
				{{ Form::close() }} -->
			</li>
		@endforeach
	</ul>
</div>

<div class="col-md-6">
	<h5>Add New Vote(每一欄都要有值^_^，都輸入一個數字即可)</h5>

	@include('tasks/partials/_form')
</div>
@stop