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

    <form action="{{ route('kebaya.import') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row card">
            <div class="col-md-12">
                <input type="file" name="file">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </form>
@endsection