<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Course;
use App\Models\Instructor;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    /**
     * Menampilkan daftar tugas.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assignments = Assignment::with(['course', 'instructor'])->paginate(10);
        return view('assignments.index', compact('assignments'));
    }

    /**
     * Menampilkan form untuk membuat tugas baru.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();
        $instructors = Instructor::all();
        return view('assignments.create', compact('courses', 'instructors'));
    }

    /**
     * Menyimpan tugas baru ke database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'CourseID' => 'required|exists:courses,CourseID',
            'InstructorID' => 'required|exists:instructors,InstructorID',
            'AssignmentName' => 'required|string|max:255',
            'DueDate' => 'required|date',
        ]);

        Assignment::create($request->all());

        return redirect()->route('assignments.index')
                         ->with('success', 'Tugas berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail tugas.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $assignment = Assignment::with(['course', 'instructor'])->findOrFail($id);
        return view('assignments.show', compact('assignment'));
    }

    /**
     * Menampilkan form untuk mengedit tugas.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $assignment = Assignment::findOrFail($id);
        $courses = Course::all();
        $instructors = Instructor::all();
        return view('assignments.edit', compact('assignment', 'courses', 'instructors'));
    }

    /**
     * Memperbarui data tugas.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $assignment = Assignment::findOrFail($id);

        $request->validate([
            'CourseID' => 'required|exists:courses,CourseID',
            'InstructorID' => 'required|exists:instructors,InstructorID',
            'AssignmentName' => 'required|string|max:255',
            'DueDate' => 'required|date',
        ]);

        $assignment->update($request->all());

        return redirect()->route('assignments.index')
                         ->with('success', 'Tugas berhasil diperbarui.');
    }

    /**
     * Menghapus tugas.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $assignment = Assignment::findOrFail($id);
        $assignment->delete();

        return redirect()->route('assignments.index')
                         ->with('success', 'Tugas berhasil dihapus.');
    }
}
