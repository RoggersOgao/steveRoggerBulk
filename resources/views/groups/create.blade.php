@extends('layouts.dashboard')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>New Contacts Group</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('groups.index') }}"> Back</a>
        </div>
    </div>
</div>

<div class="row d-flex justify-content-center">
  <div class="col-lg-8 ">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Contacts Group</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      @if ($errors->any())
          <div class="alert alert-danger">
              <strong>Whoops!</strong> There were some problems with your input.<br><br>
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif

      <form role="form" action="{{ route('groups.store') }}" method="POST">
          @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="name">Group Name</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Enter Group Name">
          </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
    <!-- /.card -->
  </div>

</div>


@endsection
