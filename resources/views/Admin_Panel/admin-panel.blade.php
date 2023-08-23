@extends('layout')

@section('title', 'Admin Panel')

@section('content')



    @if(session('success'))
    <div class="alert alert-info text-center">
        {{ session('success') }}
    </div>
@endif

@if(session('success2'))
<div class="alert alert-danger text-center">
    {{ session('success2') }}
</div>
@endif



    <div class="container mt-2 text-center">
    <h1>Admin Panel</h1>
    <hr>
    </div>


    <div class="d-grid gap-2 col-6 mx-auto">
        <a href="{{ route('create-user') }}" class="btn btn-primary btn-lg">Create Employee</a>
    </div>

    <div class="container mt-4">
        @if ($employees->isEmpty())
        <div class="alert alert-info text-center">
            No employees to display.
        </div>
        @else
        <table class="table table-bordered">
            <thead>
                <tr class="text-center">
                    <th>Name</th>
                    <th>Email</th>
                    <th>Department</th>
                    <th>Designation</th>
                    <th>Date of Joining</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                    <tr class="text-center">
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->department }}</td>
                        <td>{{ $employee->designation }}</td>
                        <td>{{ $employee->date_of_joining }}</td>
                        <td>
                            <form method="POST" action="{{ route('delete-user', ['id' => $employee->id]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                            <a href="{{ route('edit-user', ['id' => $employee->id]) }}" class="btn btn-primary">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>


@endsection