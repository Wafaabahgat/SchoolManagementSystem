<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\ClassSubject;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClassSubjectController extends Controller
{

        public function index(Request $request)
    {
        $classes = ClassModel::with('subjects')
            ->when($request->class_id, function ($query) use ($request) {
                $query->where('id', $request->class_id);
            })
            ->paginate(10);

        $data = [
            'head_title' => 'Subject Assign',
            'classes' => ClassModel::all(), // لإضافة فلتر البحث حسب الصف
            'subjects' => Subject::all(),
            'cls' => $classes
        ];

        return view('admin.assign-subject.index', $data);
    }

    public function create()
    {
        $data = [
            'head_title' => 'Create Subject Assign',
            'classes' => ClassModel::all(),
            'subjects' => Subject::all(),
        ];

        return view('admin.assign-subject.create', $data);
    }

    public function insert(Request $request)
    {
        $request->validate([
            'class_id' => 'required|exists:classess,id',
            'subject_ids' => 'required|array',
            'subject_ids.*' => 'exists:subjects,id',
        ]);

        $existingAssignments = ClassSubject::where('class_id', $request->class_id)
            ->pluck('subject_id')
            ->toArray();

        $newAssignments = [];
        foreach ($request->subject_ids as $subject_id) {
            if (!in_array($subject_id, $existingAssignments)) {
                $newAssignments[] = [
                    'class_id' => $request->class_id,
                    'subject_id' => $subject_id,
                    'status' => $request->status ?? '0',
                    // 'created_by' => Auth::id(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        if (!empty($newAssignments)) {
            ClassSubject::insert($newAssignments);
            $message = 'New subjects assigned successfully';
        } else {
            $message = 'No new subjects assigned because they already exist.';
        }

        return redirect()->route('admin.assign-subject.index')
            ->with('success', $message);
    }

   public function edit(string $id)
{
    $assignment = ClassSubject::with(['class', 'subject'])->findOrFail($id);

    $data = [
        'head_title' => 'Edit Subject Assign',
        'assignment' => $assignment,
        'classes' => ClassModel::all(), // Optional, if you allow changing class
        'subjects' => Subject::all(),   // Optional, if you allow changing subject
    ];

    return view('admin.assign-subject.edit', $data);
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $subject = ClassSubject::findOrFail($id);

        $subject->update([
            'name' => $request->name,
            'status' => $request->status,
        ]);
        dd($subject);
        return redirect()->route('admin.assign-subject.index')->with('success', 'Subject Assign updated successfully!');
    }


    public function destroy(string $id)
    {
        $subject = ClassSubject::findOrFail($id);
        $subject->delete();

        return redirect()->route('admin.assign-subject.index')->with('success', 'Subject Assign Deleted successfully!');
    }

    public function trash(Request $request)
    {
        $data['head_title'] = 'Trash Subject Assign';

        $query = ClassSubject::onlyTrashed();

        if (!empty($request->name)) {
            $query->where('subjects.name', 'like', '%' . $request->name . '%');
        }

        $data['subjects'] = $query->paginate(5);
        return view('admin.assign-subject.trash', $data);
    }


    public function restore(Request $request, string $id)
    {
        $data['head_title'] = 'Restore Subject Assign';

        $data = ClassSubject::onlyTrashed()->findOrFail($id);
        $data->restore();

        return redirect()->route('admin.assign-subject.trash')->with('success', 'Subject Assign Restored successfully!');
    }

    public function forceDelete(string $id)
    {

        $data = ClassSubject::onlyTrashed()->findOrFail($id);
        $data->forceDelete();

        return redirect()->route('admin.assign-subject.trash')->with('success', 'Subject Assign Deleted successfully!');
    }
}
