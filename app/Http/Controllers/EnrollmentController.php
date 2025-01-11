<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    /**
     * Menampilkan daftar pendaftaran.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enrollments = Enrollment::with(['student', 'course'])->paginate(10);
        return view('enrollments.index', compact('enrollments'));
    }

    /**
     * Menampilkan form untuk membuat pendaftaran baru.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Student::all();
        $courses = Course::all();
        return view('enrollments.create', compact('students', 'courses'));
    }

    /**
     * Menyimpan pendaftaran baru ke database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'StudentID' => 'required|exists:students,StudentID',
            'CourseID' => 'required|exists:courses,CourseID',
            'EnrollmentDate' => 'required|date',
        ]);

        Enrollment::create($request->all());

        return redirect()->route('enrollments.index')
                         ->with('success', 'Pendaftaran berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail pendaftaran.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $enrollment = Enrollment::with(['student', 'course'])->findOrFail($id);
        return view('enrollments.show', compact('enrollment'));
    }

    /**
     * Menampilkan form untuk mengedit pendaftaran.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $enrollment = Enrollment::findOrFail($id);
        $students = Student::all();
        $courses = Course::all();
        return view('enrollments.edit', compact('enrollment', 'students', 'courses'));
    }

    /**
     * Memperbarui data pendaftaran.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $enrollment = Enrollment::findOrFail($id);

        $request->validate([
            'StudentID' => 'required|exists:students,StudentID',
            'CourseID' => 'required|exists:courses,CourseID',
            'EnrollmentDate' => 'required|date',
        ]);

        $enrollment->update($request->all());

        return redirect()->route('enrollments.index')
                         ->with('success', 'Pendaftaran berhasil diperbarui.');
    }

    /**
     * Menghapus pendaftaran.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $enrollment = Enrollment::findOrFail($id);
        $enrollment->delete();

        return redirect()->route('enrollments.index')
                         ->with('success', 'Pendaftaran berhasil dihapus.');
    }
}
