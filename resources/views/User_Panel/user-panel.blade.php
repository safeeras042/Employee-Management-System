@extends('layout')

@section('title', 'User Panel')

@section('content')


  

    
    @if ($user->is_admin)
    <div class="alert alert-danger text-center">You are an Admin user. Go to Admin Panel to view all employees</div>
@else
    <div class="container mt-5 ">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white text-center h2">
                        Employee Details
                    </div>
                    <div class="card-body text-center">
                        <p class="h5"><strong>Name:</strong> {{ $user->name }}</p><hr>
                        <p class="h5"><strong>Email:</strong> {{ $user->email }}</p><hr>
                        <p class="h5"><strong>Department:</strong> {{ $employee->department }}</p><hr>
                        <p class="h5"><strong>Designation:</strong> {{ $employee->designation }}</p><hr>
                        <p class="h5"><strong>Date of Joining:</strong> {{ $employee->date_of_joining }}</p><hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif




@endsection