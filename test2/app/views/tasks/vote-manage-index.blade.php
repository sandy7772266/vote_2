@extends('layouts.master')




@section('content')
<div class="col-md-6">
	<h3>All Votes ~ title</h3>
	<a href="{{ url('/insert-first') }}"><strong>新增</strong></a>	                                               	
	<ul class="list-group">
		@foreach ($ary[0] as $vote)
			<li class="list-group-item">
				
				@if ($ary[1][$vote->id]<>'沒有資料')

				{{$ary[1][$vote->id]}}
				<a href="{{ url('/candidate_data_show', array($vote->id), false) }}"><strong>選項內容</strong></a>
				
				@else
				{{$vote->id}}
				@endif 



				<a href="{{ url('/insert-second', array($vote->id), false) }}"><strong>上傳選項內容</strong></a>

<!-- 				{{ Form::open(['url' => 'votes', 'class' => 'form','method'=>'delete','route'=>['votes.destroy', $vote->id]]) }}
 -->			{{ Form::open(['class' => 'form','method'=>'delete','route'=>['votes.destroy', $vote->id]]) }}
				<a href="{{ url('/', array($vote->id), false) }}"><strong>{{ $vote->vote_title }}</strong></a>	                                               
                {{ Form::submit('刪除',['class'=>'btn btn-default btn-xs'])}}
				{{ Form::close() }}


				<!-- {{Form::model($vote,array('route'=>array('votes.update',$vote->id)))}}			

				{{Form::text('vote_title')}}

				<input type="submit"  />
				{{ Form::close() }} -->
			</li>
		@endforeach
	</ul>
</div>

@stop