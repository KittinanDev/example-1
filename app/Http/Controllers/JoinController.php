<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Support\Facades\DB;

class JoinController extends Controller
{
    // Left Join
    public function LeftJoin()
    {
        $result = DB::table('students')
            ->leftJoin('teachers', 'students.id', '=', 'teachers.student_id')
            ->select('students.name as Student_name', 'teachers.name as Teacher_name')
            ->get();

        return $result;
    }

    // Right Join
    public function RightJoin()
    {
        $result = DB::table('students')
            ->rightJoin('teachers', 'students.id', '=', 'teachers.student_id')
            ->select('students.name as Student_name', 'teachers.name as Teacher_name')
            ->get();

        return $result;
    }

    // Inner Join
    public function InnerJoin()
    {
        $result = DB::table('students')
            ->join('teachers', 'students.id', '=', 'teachers.student_id')
            ->select('students.name as Student_name', 'teachers.name as Teacher_name')
            ->get();

        return $result;
    }

    // Full Outer Join
    public function FullOuterJoin()
    {
        $re_leftjoin = DB::table('students')
            ->leftJoin('teachers', 'students.id', '=', 'teachers.student_id')
            ->select('students.name as Student_name', 'teachers.name as Teacher_name');

        $re_rightjoin = DB::table('students')
            ->rightJoin('teachers', 'students.id', '=', 'teachers.student_id')
            ->select('students.name as Student_name', 'teachers.name as Teacher_name');

        $result = $re_leftjoin->union($re_rightjoin)
            ->get();

        return $result;
    }
}
