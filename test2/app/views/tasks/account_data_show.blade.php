@extends('layouts.master')




@section('content')
<div class="col-md-6">
	
	<ul class="list-group">
	<?php 
			$index=1;
	      	$redo = $data[3];
	      	$vote_id = Session::get('vote_id');
	?>

		@if ($redo == 1)
		
	    以下為舊的籤票內容	<a href="{{ url('/account_redo_true', array($vote_id), false) }}"><strong>確定重做籤票</strong></a><br>


	    @endif
	籤票共 {{count($data[0])}}  張
		@foreach ($data[0] as $account)
			<li class="list-group-item">
				{{$index ++}}
				學校代號：{{$data[1]}}
				籤號：{{$account->username}}
				<!-- {{$account->vote_id}}
				{{$account->finish_at}}
 -->

				<br>
				
			</li>
		@endforeach

	    


	</ul>
</div>

@stop