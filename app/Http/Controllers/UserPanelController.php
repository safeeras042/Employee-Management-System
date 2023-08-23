<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class UserPanelController extends Controller
{


    // Checks if user authenticated and if not sends 'from' data to hide 'create admin account' option in login.
    public function index()
    {
        if (!auth()->check()) {
            return redirect()->route('login', ['from' => 'user-panel']);
        }
        $user = auth()->user();
        $employee = Employee::where('user_id', $user->id)->first();
        return view('User_Panel/user-panel', compact('user', 'employee'));
         
    }
}
