<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Rayons;
use App\Models\Rombels;
use App\Models\Students;
use Illuminate\Http\Request;
use PHPUnit\Framework\MockObject\Builder\Stub;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Students::with('rayon', 'rombel')->get();
        return view('pages.admin.siswa.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $student = Students::with('rombel', 'rayon')->get();
        $rombel = Rombels::all();
        $rayon = Rayons::all();
        return view('pages.admin.siswa.create', compact('student', 'rombel', 'rayon'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required',
            'name' => 'required',
            'rombel_id' => 'required',
            'rayon_id' => 'required'
        ]);

        Students::create($request->all());

        return redirect()->route('student.home')->with('success', 'Data Siswa Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(Students $students)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Students $students, $id)
    {
        $students = Students::with('rayon', 'rombel')->find($id);
        $rombel = Rombels::all();
        $rayon = Rayons::all();
        return view('pages.admin.siswa.edit', compact('students', 'rombel', 'rayon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nis' => 'required',
            'name' => 'required',
            'rombel_id' => 'required|numeric',
            'rayon_id' => 'required|numeric'
        ]);

        Students::where('id', $id)->update([
            'nis' => $request->nis,
            'name' => $request->name,
            'rombel_id' => $request->rombel_id,
            'rayon_id' => $request->rayon_id
        ]);

        return redirect()->route('student.home')->with('success', 'Data Siswa Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Students $student, $id)
    {
        Students::where('id', $id)->delete();

        return redirect()->route('student.home')->with('success', 'Berhasil Menghapus Data');
    }

    public function showSiswaByRayon()
    {
        // Ambil rayon_id dari pembimbing siswa yang sedang login
        $rayonId = Auth::user()->rayon->id;

        // Ambil data siswa berdasarkan rayon
        $studentByRayon = Students::where('rayon_id', $rayonId)->get();

        // Kirim data Students ke tampilan
        return view('student.index', ['Students' => $studentByRayon]);
    }
}
