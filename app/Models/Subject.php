<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class Subject extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'type', 'status', 'created_by', 'is_deleted'];

    static public function getRecord(Request $request)
    {
        $query = self::select('subjects.*', 'users.name as created_by_name')
            ->join('users', 'users.id', 'subjects.created_by');

        if (!empty($request->name)) {
            $query->where('subjects.name', 'like', '%' . $request->name . '%');
        }

        if (!empty($request->date)) {
            $query->whereDate('subjects.created_at', '=', $request->date);
        }

        return $query->where('subjects.is_deleted', '=', 'no')
            ->orderBy('subjects.id', 'desc')
            ->paginate(5);
    }
}
