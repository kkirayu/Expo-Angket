<?php

namespace App\Http\Controllers;

use App\Models\Acara;
use App\Models\Role;
use App\Models\Soal;
use Illuminate\Http\Request;

class SoalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $soal = Soal::all();
        return view('Admin.tableSoal', compact('soal'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $acaras = Acara::all();
        $getRoles = Role::where('id','!=',1)->orderBy('role', 'asc')->get();
        return view('Admin.AcaraCreateSoal', compact('acaras','getRoles'));
    }







    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pertanyaan.*' => 'required|string',
            'jawaban.*' => 'required|string',
            'role.*' => 'required|array',
        ]);

        foreach ($request->acara_id as $key => $value) {

            $roleString = implode(',', $request->input('roles')[$key]);
            dd($roleString);

            Soal::create([
                'acara_id' => $value,
                'pertanyaan' => $request->pertanyaan[$key],
                'jawaban' => $request->jawaban[$key],
                'role' => $roleString,
            ]);
        }

        return redirect()->route('tableSoal')->with('success', 'Soal berhasil ditambahkan!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $soal = Soal::findOrFail($id);
        $acaras = Acara::all();

        return view('Admin.Soaledit', compact('soal', 'acaras'));
    }

    /**
     * Update the specified resource in storage.
     */
   // SoalController.php

// ...

public function update(Request $request, $id)
{
    $soal = Soal::findOrFail($id);

    // Validasi data input
    $request->validate([
        'pertanyaan' => 'required|string',
        'jawaban' => 'required|string',
        'role' => 'required|array',
    ]);

    // Simpan data ke dalam database
    $soal->update([
        'acara_id' => $request->acara_id,
        'pertanyaan' => $request->pertanyaan,
        'jawaban' => $request->jawaban,
        'role' => implode(',', $request->role),
    ]);

    // Redirect dengan pesan sukses
    return redirect()->route('tableSoal')->with('success', 'Soal berhasil diperbarui!');
}



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
