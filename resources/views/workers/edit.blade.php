@extends('main')

@section('title', '| Edit Worker Information')

@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<hr>
			{!! Form::model($worker, ['route' => ['workers.update', $worker->id], 'method' => 'PUT']) !!}
    		{{ Form::label('name', 'Name:') }}
				{{ Form::text('name', null, array('class' => 'form-control input-lg')) }}

				{{ Form::label('company', 'Company:') }}
				{{ Form::text('company', null, array('class' => 'form-control input-lg')) }}

				{{ Form::label('email', 'Email:') }}
				{{ Form::text('email', null, array('class' => 'form-control input-lg')) }}

				{{ Form::label('phone_number', 'Phone Number:') }}
				{{ Form::text('phone_number', null, array('class' => 'form-control input-lg')) }}
				<br>
				{{ Form::submit('Update Information', ['class' => 'btn btn-success btn-lg btn-block']) }}
				<br>
				{!! Html::linkRoute('workers.show', 'Cancel', array($worker->id),array('class' => 'btn btn-danger btn-lg btn-block')) !!}
				{!! Form::close() !!}			
		</div>
	</div>
@endsection