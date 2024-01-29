<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Soal;
use App\Models\Acara;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SoalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $getAcara = Acara::where('slug',$slug)->get('id');
        // $soal = Soal::where('acara_id', $getAcara);
        // // dd($soal);
        // $getRole = Role::all();
        // return view('Admin.soal.soal-index', compact('soal','getRole'));
    }

    public function soalAcara($slug)
    {
        $getAcaraId = Acara::where('slug', $slug)->first();
        $soal = Soal::where('acara_id', $getAcaraId->id)->orderBy('pertanyaan', 'asc')->get();
        $judul = $getAcaraId->nama_acara;
        $countRoleAcara = count(Role::where('acara_id',$getAcaraId->id)->get());
        // dd($countRoleAcara);
        $getRole = Role::all();
        return view('Admin.soal.soal-index', compact('getAcaraId','soal', 'getRole', 'judul', 'countRoleAcara'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $acaras = Acara::all();
        $getRoles = Role::where('id', '!=', 1)->orderBy('role', 'asc')->get();
        return view('Admin.AcaraCreateSoal', compact('acaras', 'getRoles'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'req.*.pertanyaan' => 'required',
            'req.*.role' => 'required'
        ]);


        $acaraId = $request->input('req.0.acara_id');
        $getAcara = Acara::findOrFail($acaraId);
        $slug = $getAcara->slug;

        $data = [];
        foreach ($request->req as $r) {

            $data[] = [
                'acara_id' => $r['acara_id'],
                'pertanyaan' => $r['pertanyaan'],
                'role_id' => json_encode($r['role']),
            ];
        }

        Soal::insert($data);
        // dd($data);
        $notif = array(
            'message' => 'Soal Angket Berhasil Ditambah',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.soal', $slug)->with($notif);
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

        $dId = decrypt($id);
        $edit = Soal::findOrFail($dId);
        $getAcara = Acara::where('id', $edit->acara_id)->first();
        // dd($getAcara);
        $getRoles = Role::where('id', '!=', 1)->where('acara_id',$getAcara->id)->orderBy('role', 'asc')->get();
        return view('Admin.acara.acara-form-soal', compact('edit', 'getRoles', 'getAcara'));
    }

    /**
     * Update the specified resource in storage.
     */
    // SoalController.php

    // ...

    public function update(Request $request, $id)
    {
        $request->validate([
            'req.*.pertanyaan' => 'required|string',
            'req.*.role' => 'required',
        ]);

        $slug = $request->slug;
        Soal::findOrFail($id)->update([
            'pertanyaan' => $request->req[0]['pertanyaan'],
            'role_id' => json_encode($request->req[0]['role']),
        ]);

        $notif = array(
            'message' => 'Soal Angket Berhasil Diubah',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.soal', $slug)->with($notif);
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

    public function angketForm()
    {
        $soal = Soal::all();
        return view('angketForm', compact('soal'));
    }
}
