<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubjectRequest;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $subjects = Subject::getRecord($request);
        $data = [
            'head_title' => 'Subject',
            'subjects' => $subjects,
        ];
        // dd($data);
        return view('admin.subject.index', $data);
    }

    public function create()
    {
        $data['head_title'] = 'Create Subject';

        return view('admin.subject.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SubjectRequest $request)
    {
        $data['head_title'] = 'Add New Subject';

        Subject::create([
            'name' => $request->name,
            'type' => $request->type,
            'status' => $request->status,
            'created_by' => Auth::user()->id,
        ]);

        return redirect()->route('admin.subject.index')->with('success', 'Subject added successfully!');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $data['head_title'] = 'Edit Subject';

        $data['subject'] = Subject::findOrFail($id);

        return view('admin.subject.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SubjectRequest $request, string $id)
    {
        $subject = Subject::findOrFail($id);

        $subject->update([
            'name' => $request->name,
            'status' => $request->status,
            'type' => $request->type,
        ]);

        return redirect()->route('admin.subject.index')->with('success', 'Subject updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subject = Subject::findOrFail($id);
        $subject->delete();

        return redirect()->route('admin.subject.index')->with('success', 'Subject Deleted successfully!');
    }

    public function trash(Request $request)
    {
        $data['head_title'] = 'Trash Subject';

        $query = Subject::onlyTrashed();

        if (!empty($request->name)) {
            $query->where('subjects.name', 'like', '%' . $request->name . '%');
        }

        $data['subjects'] = $query->paginate(5);
        return view('admin.subject.trash', $data);
    }


    public function restore(Request $request, string $id)
    {
        $data['head_title'] = 'Restore Subject';

        $data = Subject::onlyTrashed()->findOrFail($id);
        $data->restore();

        return redirect()->route('admin.subject.trash')->with('success', 'Subject Restored successfully!');
    }

    public function forceDelete(string $id)
    {

        $data = Subject::onlyTrashed()->findOrFail($id);
        $data->forceDelete();

        return redirect()->route('admin.subject.trash')->with('success', 'Subject Deleted successfully!');
    }
}
