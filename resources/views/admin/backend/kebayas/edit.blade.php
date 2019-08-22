@extends('admin.backend.kebayas.layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Edit </h2>
            </div>
            <div class="float-right">
                <a class="btn btn-primary" href="{{ route('kebaya.index') }}"> Back</a>
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
  
    <form action="{{ route('kebaya.update', $data) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card shadow mb-4">

        <div class="row">
            <div class="col-lg-7">
                <div class="form-group">
                    <strong> Name:</strong>
                    <input type="text" name="name" value="{{ old('name')!==null ? old('name') : $data->name }}" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-lg-7">
                <div class="form-group">
                    <strong> Picture:</strong>
                    <input type="file" name="image" value="{{ old('image')!==null ? old('image') : $data->image }}" class="form-control" placeholder="Image">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        </div>
    </form>
@endsection
