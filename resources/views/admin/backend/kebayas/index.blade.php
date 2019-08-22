@extends('admin.layouts.app')
@section('title', 'Kebaya')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2 class="float-left">Kebaya</h2>
            <a class="btn btn-primary float-right"  href="{{ route('kebaya.create') }}"> Create </a>
            <a class="btn btn-success float-right"  href="{{ route('kebaya.export') }}"> Export </a>
            <a class="btn btn-warning float-right"  href="{{ route('kebaya.imp') }}"> Import </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @include('admin.backend.kebayas.table')
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
    </div>

@endsection