
@extends('layouts.master')




@section('content')
<div class="col-md-6">
	<h3>投票結果</h3>
	<ul class="list-group">

		@foreach ($votes as $vote)

			<li class="list-group-item">
				<table>
				<tr>
				<td ><a href="{{ url('/vote_result_show', array($vote->id), false) }}"><strong>{{$vote->vote_title}}結果</strong></a>

				


				</td>
				<td>
				{{--@if ( $can_id <> null )--}}
				{{--<a href="{{ url('/insert-second', array($vote->id), false) }}"><strong>重新上傳選項內容</strong></a>--}}
				{{--@else--}}
				{{--<a href="{{ url('/insert-second', array($vote->id), false) }}"><strong>上傳選項內容</strong></a>--}}
				{{--@endif--}}
				</td>
				<td>
				<a href="{{ url('/account_data_show', array($vote->id), false) }}"><strong>籤票內容</strong></a>
				</td>
				
				<td>
				<a href="{{ url('/account_data_redo', array($vote->id), false) }}"><strong>重新製作籤票</strong></a>

<!-- 				{{ Form::open(['url' => 'votes', 'class' => 'form','method'=>'delete','route'=>['votes.destroy', $vote->id]]) }}
 -->			
 				</td>
 				<td>
 				<a href="{{ url('/', array($vote->id), false) }}"><strong>編輯{{ $vote->vote_title }}</strong></a>	                                               
 				</td>
 				<td>
 				{{ Form::open(['class' => 'form','method'=>'delete','route'=>['votes.destroy', $vote->id]]) }}
				
                {{ Form::submit('刪除',['class'=>'btn btn-default btn-xs'])}}
				{{ Form::close() }}



				<!-- {{Form::model($vote,array('route'=>array('votes.update',$vote->id)))}}			

				{{Form::text('vote_title')}}

				<input type="submit"  />
				{{ Form::close() }} -->
				</td>
				</tr>
				</table>
			</li>
		@endforeach
	</ul>
</div>

@stop