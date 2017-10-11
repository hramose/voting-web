@extends('template.default')

@section('styles')
<style type="text/css">
	.well{
		margin-top: 10%;
		background: transparent;
		color: #fff;
	}
	body{
		background: #2c3e50;

	}
</style>
@endsection


@section('contents')
<div id = "login">
<div class="container">
	<div class="col-md-6 col-md-offset-3 well">
		@if(Session::has('error'))
			<div class="alert alert-danger alert-dismissable">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			 	<p class="text-center"><strong>{{Session::get('error')}}</strong></p>
			</div>
		@endif
		<form class="form-horizontal" action="{{route('loginCheck')}}" method="POST">
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="email">ID:</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" name="student_id" placeholder="Enter Student ID">
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="pwd">Password:</label>
		    <div class="col-sm-10"> 
		      <input type="password" class="form-control" name="password" placeholder="Enter password">
		    </div>
		  </div>
		  <div class="form-group"> 
		    <div class="col-sm-offset-2 col-sm-10">
		      <div class="checkbox">
		        <label><input type="checkbox"> Remember me</label>
		      </div>
		    </div>
		  </div>
		  <div class="form-group"> 
		    <div class="col-sm-offset-2 col-sm-10">
		      <button type="submit" class="btn btn-default">Submit</button>
		      {{csrf_field()}}
		    </div>
		  </div>
		</form>
	</div>
</div>
</div>
@endsection


@section('scripts')

@endsection