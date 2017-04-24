@extends('main')

@section('title', '| View Post')

@section('content')

<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <div class="well">
      <div class="col-md-8 col-md-offset-3">
        <dl class="dl-horizontal">
          <dt>Name:</dt>
          <dd>{{ $worker->name }}</dd>
        </dl>
        <dl class="dl-horizontal">
          <dt>Company:</dt>
          <dd>{{ $worker->company }}</dd>
        </dl>
        <dl class="dl-horizontal">
          <dt>Email:</dt>
          <dd>{{ $worker->email }}</dd>
        </dl>
        <dl class="dl-horizontal">
          <dt>Phone Number:</dt>
          <dd>{{ $worker->phone_number}}</dd>
        </dl>
        <dl class="dl-horizontal">
          <dt>Last Updated:</dt>
          <dd>{{ date('M j, Y - h:i:s a', strtotime($worker->updated_at))}}</dd>
        </dl>
      </div>
        <hr>
        <div class="row">
          <div class="col-md-6">
            {{ Html::linkroute('workers.edit', 'Edit', array($worker->id), array('class' => 'btn btn-primary btn-block')) }}
          </div>
          <div class="col-md-6">
            {!! Form::open(['route' => ['workers.destroy', $worker->id], 'method' => 'DELETE']) !!}
              {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) }}
            {!! Form::close() !!}
          </div>
      </div>
    </div>
  </div>
</div>
	
	
@endsection