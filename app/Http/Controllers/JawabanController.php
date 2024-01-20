<?php

namespace App\Http\Controllers;

use App\Models\Acara;
use App\Models\jawaban;
use App\Models\Role;
use App\Models\Soal;
use Illuminate\Http\Request;

class JawabanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function angketForm($acaraId)
    {
        // Dapatkan soal yang terkait dengan acara_id
        $soal = Soal::where('acara_id', $acaraId)->get();

        // Dapatkan informasi acara
        $acara = Acara::findOrFail($acaraId);
        $roles = Role::all();
        $userRole = auth()->user()->role;

        // $soal = Soal::where('acara_id', $acara->id)->where('role', $userRole)->get();

        return view('angketForm', compact('soal', 'acara','roles','userRole'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nama' => 'required|string',
            'email' => 'required|email',
            'instansi' => 'required|string',
            'jawaban.*' => 'required|integer',
        ]);
    
        $jawabanData = $request->input('jawaban');
        $user_id = auth()->user()->id;
    
        $totalNilai = 0;
    
        foreach ($jawabanData as $jawaban) {
            $totalNilai += intval($jawaban);
        }
    
        Jawaban::create([
            'user_id' => $user_id,
            'jawaban' => $totalNilai,
            'nama' => $request->input('nama'),
            'email' => $request->input('email'),
            'instansi' => $request->input('instansi'),
        ]);
    
        return redirect()->back()->with('success', 'Jawaban berhasil disimpan.');
    }

    
    


    /**
     * Display the specified resource.
     */
    public function show(jawaban $jawaban)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(jawaban $jawaban)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, jawaban $jawaban)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(jawaban $jawaban)
    {
        //
    }
}
