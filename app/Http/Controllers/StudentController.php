<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    /**
     * Menampilkan daftar mahasiswa.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::paginate(10);
        return view('students.index', compact('students'));
    }

    /**
     * Menampilkan form untuk membuat mahasiswa baru.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Menyimpan mahasiswa baru ke database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'FirstName' => 'required|string|max:255',
            'LastName' => 'required|string|max:255',
            'Email' => 'required|email|unique:students,Email',
            'PhoneNumber' => 'nullable|string|max:20',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
        ]);

        $data = $request->all();

        // Handle upload gambar
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $data['image'] = basename($imagePath);
        }

        Student::create($data);

        return redirect()->route('students.index')
                         ->with('success', 'Mahasiswa berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail mahasiswa.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::findOrFail($id);
        return view('students.show', compact('student'));
    }

    /**
     * Menampilkan form untuk mengedit mahasiswa.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('students.edit', compact('student'));
    }

    /**
     * Memperbarui data mahasiswa.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $request->validate([
            'FirstName' => 'required|string|max:255',
            'LastName' => 'required|string|max:255',
            'Email' => 'required|email|unique:students,Email,' . $student->StudentID . ',StudentID',
            'PhoneNumber' => 'nullable|string|max:20',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
        ]);

        $data = $request->all();

        // Handle upload gambar
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($student->image && Storage::disk('public')->exists('images/' . $student->image)) {
                Storage::disk('public')->delete('images/' . $student->image);
            }

            $imagePath = $request->file('image')->store('images', 'public');
            $data['image'] = basename($imagePath);
        }

        $student->update($data);

        return redirect()->route('students.index')
                         ->with('success', 'Mahasiswa berhasil diperbarui.');
    }

    /**
     * Menghapus mahasiswa.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::findOrFail($id);

        // Hapus gambar jika ada
        if ($student->image && Storage::disk('public')->exists('images/' . $student->image)) {
            Storage::disk('public')->delete('images/' . $student->image);
        }

        $student->delete();

        return redirect()->route('students.index')
                         ->with('success', 'Mahasiswa berhasil dihapus.');
    }
}
