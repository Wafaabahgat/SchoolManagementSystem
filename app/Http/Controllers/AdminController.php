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

        return view('admin.admin.index', $data);
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

    public function edit($id)
    {
        $data['user'] = User::findOrFail($id);

        if ($data['user']) {
            $data['head_title'] = 'Updated Admin';
            return view('admin.admin.edit', $data);
        } else {
            abort(404);
        }
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $data['head_title'] = 'Updated Admin';

        $updateData = [
            'name' => $request->name,
            'email' => $request->email,
            'role' => 'admin',
        ];

        if ($request->filled('password')) {
            $updateData['password'] = Hash::make($request->password);
        }

        $user->update($updateData);

        return redirect()->route('admin.list')->with('success', 'Admin Updated successfully!');
    }


    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.list')->with('success', 'Admin Deleted successfully!');
    }
}
