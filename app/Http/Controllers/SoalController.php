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
        $getRole = Role::all();
        return view('Admin.tableSoal', compact('soal','getRole'));
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
        // $request->validate([
        //     'pertanyaan.*' => 'required|string',
        //     // 'jawaban.*' => 'required|string',
        //     'role.*' => 'required|array',
        // ]);



        // foreach ($request->acara_id as $key => $value) {

        //     $roleString = implode(',', $request->input('roles')[$key]);
        //     dd($roleString);

        //     Soal::create([
        //         'acara_id' => $value,
        //         'pertanyaan' => $request->pertanyaan[$key],
        //         'jawaban' => $request->jawaban[$key],
        //         'role' => $roleString,
        //     ]);
        // }

        // $roleString = implode(',', $request->input('roles'));
        // Soal::create([
        //             'acara_id' => $request->acara,
        //             'pertanyaan' => $request->pertanyaan,
        //             'role' => $roleString,
        //         ]);

        $request->validate([
            'req.*.pertanyaan' => 'required',
            'req.*.role' => 'required'
        ]);


        foreach ($request->req as $key => $value) {

            // $roleString = implode(',', $roleee[$key]);

            Soal::create($value);
            // Soal::create([
            //     'acara_id' => $request->acara[$key],
            //     'pertanyaan' => $request->pertanyaan[$key],
            //     'role' => $roleString,
            // ]);
        }
        // dd($roleee);

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
        $getRoles = Role::where('id', '!=', 1)->orderBy('role', 'asc')->get();

        return view('Admin.editSoal', compact('soal', 'getRoles'));
    }

    /**
     * Update the specified resource in storage.
     */
   // SoalController.php

// ...

public function update(Request $request, $id)
{
    $soal = Soal::findOrFail($id);

    $request->validate([
        'pertanyaan' => 'required|string',
        'req.0.role' => 'required',
    ]);

    $soal->update([
        'pertanyaan' => $request->pertanyaan,
        'role' => $request->req[0]['role'],
    ]);

    return redirect()->route('tableSoal')->with('success', 'Soal berhasil diperbarui!');
}









    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $soal = Soal::findOrFail($id);
    
        // Delete the soal
        $soal->delete();
    
        // Redirect with success message
        return redirect()->route('tableSoal')->with('success', 'Soal berhasil dihapus!');
    }
    
}
