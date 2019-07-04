@extends('admin.backend.users.layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Edit </h2>
            </div>
            <div class="float-right">
                <a class="btn btn-primary" href="{{ route('user.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
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
  
    <form action="{{ route('user.update', $user) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card shadow mb-4">

        <div class="row">
            <div class="col-lg-7">
                <div class="form-group">
                    <strong> Name:</strong>
                    <input type="text" name="name" value="{{ old('name')!==null ? old('name') : $user->name }}" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-lg-7">
                <div class="form-group">
                    <strong> Email:</strong>
                    <input type="email" name="email" value="{{ old('email')!==null ? old('email') : $user->email }}" class="form-control" placeholder="Email">
                </div>
            </div>
            <div class="col-lg-7">
                <div class="form-group">
                    <strong> Password:</strong>
                    <input type="password" name="password" value="{{ old('password')!==null ? old('password') : $user->password }}" class="form-control" placeholder="Password">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        </div>
    </form>
@endsection
