<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Exception;

class StudentController extends Controller
{
    
    public function Home()
    {
        return "Hello from function Home!";
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $students = Student::latest()->paginate(5);
        return view('students.index', compact('students'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'division' => 'required',
            'photo' => 'required|image|mimes:png,jpg,jpeg,gif,svg|max:2048',
        ]);

        $input = $request->all();
        if ($image = $request->file('photo')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['photo'] = "$profileImage";
        }

        Student::create($input);

        return redirect()->route('students.index')
            ->with('success', 'Student created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student): View
    {
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student): View
    {
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'division' => 'required',
        ]);

        $input = $request->all();
        try {
            if ($image = $request->file('photo')) {
                // ลบรูปเก่า (ถ้ามี)
                if ($student->photo && File::exists(public_path('image/' . $student->photo))) {
                    File::delete(public_path('image/' . $student->photo));
                }

                $destinationPath = 'image/';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $input['photo'] = "$profileImage";
            } else {
                unset($input['photo']);
            }

            $student->update($input);
            return redirect()->route('students.index')->with('success', 'Student updated successfully');
        } catch (Exception $e) {
            return redirect()->route('students.index')->with('error', 'Error updating student: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student): RedirectResponse
    {
        try {
            // ลบรูปเก่า (ถ้ามี)
            if ($student->photo && File::exists(public_path('image/' . $student->photo))) {
                File::delete(public_path('image/' . $student->photo));
            }

            $student->delete();
            return redirect()->route('students.index')->with('success', 'Student deleted successfully');
        } catch (Exception $e) {
            return redirect()->route('students.index')->with('error', 'Error deleting student: ' . $e->getMessage());
        }
    }
}
