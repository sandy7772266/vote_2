@extends('layouts.master')




@section('content')


	<div class="col-md-6">
		<h5>Add New Vote(每一欄都要有值^_^，都輸入一個數字即可)</h5>
		@if($err)
			{{print $err;}}
			{{$err='';}}
		@endif
		@include('tasks/partials/_form_account')
	</div>
@stop