<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;

class AdminPanelController extends Controller
{
    // views index page
    public function index()
    {
        $employees = Employee::all();
        return view('Admin_Panel/admin-panel', compact('employees'));
    }

    public function showCreateForm()
    {
        return view('Admin_Panel/create-user');
    }



// Handles the form submission to create a new user and associated employee and handles any errors.
public function store(Request $request)
{
    try {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'department' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'date_of_joining' => 'required|date',
        ]);

        // Create a new user with is_admin = 0
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'is_admin' => 0,
        ]);

        if (!$user) {
            throw new \Exception('User creation failed.');
        }

        // Create a new employee associated with the user
        $employee = Employee::create([
            'user_id' => $user->id,
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'department' => $validatedData['department'],
            'designation' => $validatedData['designation'],
            'date_of_joining' => $validatedData['date_of_joining'],
        ]);

        if (!$employee) {
            // If employee creation fails, delete the previously created user
            $user->delete();
            throw new \Exception('Employee creation failed.');
        }

        // Redirect back with a success message
        return redirect()->route('admin')->with('success', 'Employee created successfully.');

    } catch (\Exception $e) {
        // Handle the error and redirect back with an error message
        return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
    }
}



// To delete the employee and assosiated user
public function deleteUser($id)
{
    $employee = Employee::find($id);

    if (!$employee) {
        return redirect()->route('admin')->with('error', 'Employee not found.');
    }

    $user = $employee->user; // Get the associated user

    if ($user) {
        $employee->delete(); // Delete the employee
        $user->delete(); // Delete the associated user
        return redirect()->route('admin')->with('success2', 'Employee deleted successfully.');
    } else {
        return redirect()->route('admin')->with('error', 'Associated user not found.');
    }
}



// To show the employee details in the form
public function showEditForm($id)
{
    $employee = Employee::find($id);

    if (!$employee) {
        return redirect()->route('employee-list')->with('error', 'Employee not found.');
    }else{
        return view('Admin_Panel/edit-user', compact('employee'));
    }

   
}


// To save the edited changes
public function updateUser(Request $request, $id)
{
    $employee = Employee::find($id);

    if (!$employee) {
        return redirect()->route('employee-list')->with('error', 'Employee not found.');
    }else{
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'nullable|string|min:8',
            'department' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'date_of_joining' => 'required|date',
        ]);
    
        // Update the password in the associated user model if a new password is provided
        if (!empty($data['password'])) {
        $user = $employee->user;
        $user->password = bcrypt($data['password']);
        $user->save();
        }

        $employee->update($data);
    
        return redirect()->route('admin')->with('success', 'Employee updated successfully.');
    }
}



}
