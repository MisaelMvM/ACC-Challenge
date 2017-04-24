@extends('main')

@section('title', '| Create New Worker')

@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Create New Post</h1>
			<hr>

			{!! Form::open(['route' => 'workers.store']) !!}
    		{{ Form::label('name', 'Name:') }}
				{{ Form::text('name', null, array('class' => 'form-control input-lg')) }}

				{{ Form::label('company', 'Company:') }}
				{{ Form::text('company', null, array('class' => 'form-control input-lg')) }}

				{{ Form::label('email', 'Email:') }}
				{{ Form::text('email', null, array('class' => 'form-control input-lg')) }}

				{{ Form::label('phone_number', 'Phone Number:') }}
				{{ Form::text('phone_number', null, array('class' => 'form-control input-lg')) }}
				<br>
				{{ Form::submit('Create Post', array('class' => 'btn btn-success btn-lg btn-block')) }}
			{!! Form::close() !!}			
		</div>
	</div>
@endsection