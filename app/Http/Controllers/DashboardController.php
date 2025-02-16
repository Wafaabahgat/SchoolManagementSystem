<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $data['head_title'] = 'Dashboard';

        if (Auth::user()->role == 'admin') {
            return view('admin.dashboard', $data);
        } else if (Auth::user()->role == 'student') {
            return view('admin.dashboard', $data);
        } else if (Auth::user()->role == 'instructor') {
            return view('instructor.dashboard', $data);
        } else if (Auth::user()->role == 'parent') {
            return view('parent.dashboard', $data);
        };
    }
}
