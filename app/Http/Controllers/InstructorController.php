<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InstructorController extends Controller
{
    /**
     * Menampilkan daftar instruktur.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instructors = Instructor::paginate(10);
        return view('instructors.index', compact('instructors'));
    }

    /**
     * Menampilkan form untuk membuat instruktur baru.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('instructors.create');
    }

    /**
     * Menyimpan instruktur baru ke database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'FirstName' => 'required|string|max:255',
            'LastName' => 'required|string|max:255',
            'Email' => 'required|email|unique:instructors,Email',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
        ]);

        $data = $request->all();

        // Handle upload gambar
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $data['image'] = basename($imagePath);
        }

        Instructor::create($data);

        return redirect()->route('instructors.index')
                         ->with('success', 'Instruktur berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail instruktur.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $instructor = Instructor::findOrFail($id);
        return view('instructors.show', compact('instructor'));
    }

    /**
     * Menampilkan form untuk mengedit instruktur.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $instructor = Instructor::findOrFail($id);
        return view('instructors.edit', compact('instructor'));
    }

    /**
     * Memperbarui data instruktur.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $instructor = Instructor::findOrFail($id);

        $request->validate([
            'FirstName' => 'required|string|max:255',
            'LastName' => 'required|string|max:255',
            'Email' => 'required|email|unique:instructors,Email,' . $instructor->InstructorID . ',InstructorID',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
        ]);

        $data = $request->all();

        // Handle upload gambar
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($instructor->image && Storage::disk('public')->exists('images/' . $instructor->image)) {
                Storage::disk('public')->delete('images/' . $instructor->image);
            }

            $imagePath = $request->file('image')->store('images', 'public');
            $data['image'] = basename($imagePath);
        }

        $instructor->update($data);

        return redirect()->route('instructors.index')
                         ->with('success', 'Instruktur berhasil diperbarui.');
    }

    /**
     * Menghapus instruktur.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $instructor = Instructor::findOrFail($id);

        // Hapus gambar jika ada
        if ($instructor->image && Storage::disk('public')->exists('images/' . $instructor->image)) {
            Storage::disk('public')->delete('images/' . $instructor->image);
        }

        $instructor->delete();

        return redirect()->route('instructors.index')
                         ->with('success', 'Instruktur berhasil dihapus.');
    }
}
