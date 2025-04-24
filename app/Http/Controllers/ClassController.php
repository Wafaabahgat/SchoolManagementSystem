<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClassRequest;
use App\Models\ClassModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $classess = ClassModel::getRecord($request);
        $data = [
            'head_title' => 'Class',
            'classess' => $classess,
        ];
        // dd($data);
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

    public function store(ClassRequest $request)
    {
        $data['head_title'] = 'Add New Class';

        ClassModel::create([
            'name' => $request->name,
            'status' => $request->status,
            'created_by' => Auth::user()->id,
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

    public function update(ClassRequest $request, string $id)
    {
        $class = ClassModel::findOrFail($id);

        $class->update([
            'name' => $request->name,
            'status' => $request->status,
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


    public function trash(Request $request)
    {
        $data['head_title'] = 'Trash class';

        $query = ClassModel::onlyTrashed();

        if (!empty($request->name)) {
            $query->where('classess.name', 'like', '%' . $request->name . '%');
        }

        $data['classs'] = $query->paginate(5);
        return view('admin.class.trash', $data);
    }


    public function restore(Request $request, string $id)
    {
        $data['head_title'] = 'Restore class';

        $data = ClassModel::onlyTrashed()->findOrFail($id);
        $data->restore();

        return redirect()->route('admin.class.trash')->with('success', 'class Restored successfully!');
    }

    public function forceDelete(string $id)
    {

        $data = ClassModel::onlyTrashed()->findOrFail($id);
        $data->forceDelete();

        return redirect()->route('admin.class.trash')->with('success', 'class Deleted successfully!');
    }
}
