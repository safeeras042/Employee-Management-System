@extends('layout')

@section('title', 'Create User')

@section('content')




<div class="container mt-2 text-center">
    <h1>Create User</h1>
    <hr>
    </div>

    @if(session('error'))
    <div class="alert alert-danger text-center">
        {{ session('error') }}
    </div>
@endif
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 mb-5">
                <form method="POST" action="{{ route('store-user') }}" class="border p-4 rounded shadow-lg">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold">Name:</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required >
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label fw-bold">Email:</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label fw-bold">Password:</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="department" class="form-label fw-bold">Department:</label>
                        <input type="text" name="department" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="designation" class="form-label fw-bold">Designation:</label>
                        <input type="text" name="designation" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="date_of_joining" class="form-label fw-bold">Date of Joining:</label>
                        <input type="date" name="date_of_joining" class="form-control" required>
                    </div>

                    
                    <div class="d-grid gap-2 col-12 mx-auto">
                        
                        <button type="submit" class="btn btn-primary">Create User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection