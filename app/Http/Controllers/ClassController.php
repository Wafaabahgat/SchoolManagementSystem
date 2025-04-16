<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $classess = ClassModel::get();
        $data = [
            'head_title' => 'Class',
            'classess' => $classess,
        ];

        return view('admin.class.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        $data['head_title'] = 'Create Class';

        return view('admin.class.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $data['head_title'] = 'Add New Class';

        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required',
        ]);

        ClassModel::create([
            'name' => $request->name,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.class.index')->with('success', 'Class added successfully!');
    }

    /**
     * Display the specified resource.
     */

    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(string $id)
    {
        $data['head_title'] = 'Edit Class';

        $data['class'] = ClassModel::findOrFail($id);

        return view('admin.class.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, string $id)
    {
        $class = ClassModel::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required',
        ]);

        $class->update([
            'name' => $validated['name'],
            'status' => $validated['status'],
        ]);

        return redirect()->route('admin.class.index')->with('success', 'Class updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(string $id)
    {
        $class = ClassModel::findOrFail($id);
        $class->delete();

        return redirect()->route('admin.class.index')->with('success', 'Class Deleted successfully!');
    }
}
