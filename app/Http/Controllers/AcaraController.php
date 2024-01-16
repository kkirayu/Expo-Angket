<?php

namespace App\Http\Controllers;

use App\Models\Acara;
use App\Models\Role;
use App\Models\Soal;
use Illuminate\Http\Request;

class AcaraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $acaras = Acara::all();
        return view('Admin.table', compact('acaras'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.createAcara');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_acara' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        Acara::create([
            'nama_acara' => $request->nama_acara,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('table')->with('success', 'Acara berhasil ditambahkan!');

    }

    /**
     * Display the specified resource.
     */
    public function show($acaraId)
    {
        $acaras = Acara::find($acaraId);

        return view('components.sidebar', compact('acaras'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($acaraId)
    {
        $acara = Acara::findOrFail($acaraId);
        return view('Admin.editAcara', compact('acara'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $acaraId)
    {
        $request->validate([
            'nama_acara' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        $acara = Acara::findOrFail($acaraId);
        $acara->update([
            'nama_acara' => $request->nama_acara,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('table')->with('success', 'Acara berhasil diperbarui!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($acaraId)
    {
        $acara = Acara::findOrFail($acaraId);
        $acara->delete();

        return redirect()->route('table')->with('success', 'Acara berhasil dihapus!');
    }

    public function createSoal($acaraId)
    {
        return view('Admin.acaraCreateSoal', compact('acaraId'));
    }

    public function acaraCreateSoal($id)
    {
        $dId = decrypt($id);
        $getAcara = Acara::findOrFail($dId);
        $getRoles = Role::where('id','!=','1')->get();
        return view('Admin.acaraCreateSoal-new', compact('getAcara','getRoles'));
    }
    public function renderNavigation()
    {
        $acaras = Acara::all();

        return view('components.sidebar', compact('acaras'));
    }
}
