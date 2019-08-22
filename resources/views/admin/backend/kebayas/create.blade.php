@extends('admin.backend.kebayas.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Add New Kebaya</h2>
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
   
<form action="{{ route('kebaya.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="row card">
        <div class="card-body">
            <div class="col-lg-6">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <strong>Picture:</strong>
                    <input type="file" name="image" class="form-control" placeholder="Image">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <strong>Description:</strong>
                    <textarea type="text" name="description" class="form-control" placeholder="Description"></textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <strong>Price:</strong>
                    <input type="number" name="price" class="form-control" placeholder="Price">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <strong>Item:</strong>
                    <input type="number" name="item" class="form-control" placeholder="How Many Item">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
   
</form>
@endsection