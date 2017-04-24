@extends('main')

@section('title', '| All Workers')

@section('content') 
  <table id="datatable" class="table table-responsive table-striped table-bordered">
      <thead>
          <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Company</th>
              <th>Email</th>
              <th>Phone Number</th>
              <th>Action</th>
          </tr>
      </thead>
      <tbody>
          @foreach ($workers as $worker)
          <tr>
                <td>{{ $worker->id }}</td>
                <td>{{ $worker->name }}</td>
                <td>{{ $worker->company }}</td>
                <td>{{ $worker->email }}</td>
                <td>{{ $worker->phone_number }}</td>
                <td class="iconsRow text-center" scope="row">


                {!! Form::open(['route' => ['workers.destroy', $worker->id], 'method' => 'DELETE']) !!}
                  <a href="{{ route('workers.edit', $worker->id)}}"><i class="fa fa-pencil edit"></i></a>
                  {{ Form::submit('X', ['class' => 'btn btn-danger btn-sm']) }}
                {!! Form::close() !!}

                
                </td>
                {{--  href="{{ route('workers.destroy', $worker->id)}}" --}}
          </tr>
          @endforeach
      </tbody>
  </table>
  </nav>


  <script>


    $(document).ready(function() {
      $('#datatable').DataTable({
        "columns": [
          null,
          null,
          null,
          null,
          null,
          { "orderable": false }
        ]
      });
    });
  </script>

@endsection