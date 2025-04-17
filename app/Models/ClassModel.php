<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ClassModel extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'status', 'created_by', 'is_deleted'];

    protected $table = 'classess';


    static public function getRecord(Request $request)
    {
        $query = self::select('classess.*', 'users.name as created_by_name')
            ->join('users', 'users.id', 'classess.created_by');

        if (!empty($request->name)) {
            $query->where('classess.name', 'like', '%' . $request->name . '%');
        }

        if (!empty($request->date)) {
            $query->whereDate('classess.created_at', '=', $request->date);
        }

        return $query->where('classess.is_deleted', '=', 'no')
            ->orderBy('classess.id', 'desc')
            ->paginate(5);
    }
}
