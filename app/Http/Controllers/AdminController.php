<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Http\Resources\AdminResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function list()
    {
        $admins = User::getAdmins();

        $data = [
            'head_title' => 'Admin',
            'admins' => $admins,
        ];

        return view('admin.admin.list', $data);
    }

    public function add()
    {
        $data['head_title'] = 'Add New Admin';
        return view('admin.admin.add', $data);
    }

    public function insert(Request $request)
    {
        $data['head_title'] = 'Add New Admin';
        // dd($request->all());
        if (User::where('email', $request->email)->exists()) {
            return redirect()->back()->with(['error' => 'This email is already in use.']);
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'admin',
        ]);
        return redirect()->route('admin.list')->with('success', 'Admin added successfully!');
    }
}
