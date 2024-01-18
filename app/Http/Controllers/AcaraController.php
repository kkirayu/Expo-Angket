<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Soal;
use App\Models\Acara;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class AcaraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $acaras = Acara::all();
        return view('Admin.acara.acara-index', compact('acaras'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.acara.acara-form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        $photo = $request->file('photo');
        $genNama = hexdec(uniqid()) . '.' . $photo->getClientOriginalExtension();
        $driver = new ImageManager(new Driver());
        $image = $driver->read($photo)->scale(300, 300);
        $image = $image->toJpeg(80)->save('img/acara/' . $genNama);
        $save_url = 'img/acara/' . $genNama;
        $slug = Str::slug($request->nama);

        Acara::insert([
            'nama_acara' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'photo' => $save_url,
            'slug' => $slug,
        ]);

        $notif = array(
            'message' => 'Acara Berhasil Ditambah',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.acara')->with($notif);
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
    public function edit($id)
    {
        $dId = decrypt($id);
        $edit = Acara::findOrFail($dId);
        return view('Admin.acara.acara-form', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        $acaraId = $request->id;
        $photoLama = $request->photoLama;

        if ($request->file('photo')) {
            $photo = $request->file('photo');
            @unlink(public_path($photoLama));
            $genNama = hexdec(uniqid()) . '.' . $photo->getClientOriginalExtension();
            $driver = new ImageManager(new Driver());
            $image = $driver->read($photo)->scale(300, 300);
            $save_url = 'img/acara/' . $genNama;
            $image = $image->toJpeg(80)->save('img/acara/' . $genNama);

            Acara::findOrFail($acaraId)->update([
                'nama_acara' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'photo' => $save_url
            ]);

        } else {
            Acara::findOrFail($acaraId)->update([
                'nama_acara' => $request->nama,
                'deskripsi' => $request->deskripsi
            ]);

        }

        $notif = array(
            'message' => 'Acara Berhasil Diubah',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.acara')->with($notif);
    }

    public function soal($id)
    {
        $dId = decrypt($id);
        $getAcara = Acara::findOrFail($dId);
        $getRoles = Role::where('id', '!=', 1)->orderBy('role', 'asc')->get();
        return view('Admin.acara.acara-form-soal', compact('getAcara','getRoles'));
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
        $getRoles = Role::where('id', '!=', '1')->get();
        return view('Admin.acaraCreateSoal-new', compact('getAcara', 'getRoles'));
    }
    public function angketIndex()
    {
        $acaras = Acara::all();

        return view('index', compact('acaras'));
    }
}
