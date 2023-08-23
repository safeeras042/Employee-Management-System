@extends('layout')

@section('title', 'Index')

@section('content')
@if(session('error'))
<div class="alert alert-danger text-center">
    {{ session('error') }}
</div>
@endif



<div class="container h-50 mt-5">
    <div class="row h-100 justify-content-center align-items-center text-center">
        <div class="col">
            <h1>Employee Management System</h1>
            <div class="btn-group mt-3">
                <a href="{{ route('admin') }}" class="btn btn-primary btn-lg">Admin Panel <i class="bi bi-person-plus"></i></a>
                <a href="{{ route('user-panel') }}" class="btn btn-secondary btn-lg bg-danger">User Panel <i class="bi bi-person"></i></a>
            </div>
        </div>
    </div>
</div>

@endsection
