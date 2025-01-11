<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    /**
     * Menampilkan daftar kursus.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::paginate(10);
        return view('courses.index', compact('courses'));
    }

    /**
     * Menampilkan form untuk membuat kursus baru.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Menyimpan kursus baru ke database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'CourseName' => 'required|string|max:255',
            'CourseDescription' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
        ]);

        $data = $request->all();

        // Handle upload gambar
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $data['image'] = basename($imagePath);
        }

        Course::create($data);

        return redirect()->route('courses.index')
                         ->with('success', 'Kursus berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail kursus.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::findOrFail($id);
        return view('courses.show', compact('course'));
    }

    /**
     * Menampilkan form untuk mengedit kursus.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::findOrFail($id);
        return view('courses.edit', compact('course'));
    }

    /**
     * Memperbarui data kursus.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $course = Course::findOrFail($id);

        $request->validate([
            'CourseName' => 'required|string|max:255',
            'CourseDescription' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
        ]);

        $data = $request->all();

        // Handle upload gambar
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($course->image && Storage::disk('public')->exists('images/' . $course->image)) {
                Storage::disk('public')->delete('images/' . $course->image);
            }

            $imagePath = $request->file('image')->store('images', 'public');
            $data['image'] = basename($imagePath);
        }

        $course->update($data);

        return redirect()->route('courses.index')
                         ->with('success', 'Kursus berhasil diperbarui.');
    }

    /**
     * Menghapus kursus.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::findOrFail($id);

        // Hapus gambar jika ada
        if ($course->image && Storage::disk('public')->exists('images/' . $course->image)) {
            Storage::disk('public')->delete('images/' . $course->image);
        }

        $course->delete();

        return redirect()->route('courses.index')
                         ->with('success', 'Kursus berhasil dihapus.');
    }
}
