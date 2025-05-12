<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class ClassSubject extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['class_id', 'subject_id', 'status', 'created_by', 'is_deleted'];

    static public function getRecord(Request $request)
    {
        $query = self::select('class_subjects.*', 'users.name as created_by_name')
            ->join('users', 'users.id', 'class_subjects.created_by');

        if (!empty($request->name)) {
            $query->where('class_subjects.name', 'like', '%' . $request->name . '%');
        }

        if (!empty($request->date)) {
            $query->whereDate('class_subjects.created_at', '=', $request->date);
        }

        return $query->orderBy('class_subjects.id', 'desc')
            ->paginate(5);
    }

    public function class()
    {
        return $this->belongsTo(ClassModel::class, 'class_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function subjects()
    {
        return $this->hasMany(ClassSubject::class, 'class_id')->with('subject');
    }
}
