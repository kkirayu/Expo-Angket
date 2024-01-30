<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Acara;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return view('Admin.role.role-index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.role.role-form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'req.*.role' => 'required',
        ]);

        $acara = Acara::findOrFail($request->acara);
        $slug = $acara->slug;

        $data = [];

        foreach ($request->req as $r) {

            $data[] = [
                'role' => $r['role'],
                'acara_id' => $request->acara
            ];
        }

        Role::insert($data);

        $notif = array(
            'message' => 'Role Berhasil Ditambah',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.role-acara', $slug)->with($notif);
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $dId = decrypt($id);
        $edit = Role::findOrFail($dId);
        $judul = Acara::where('id', $edit->acara_id)->first();

        return view('Admin.role.role-form', compact('edit', 'judul'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'req.0.role' => 'required'
        ]);

        $slug = $request->slug;

        Role::findOrFail($id)->update(['role' => $request->req[0]['role']]);

        $notif = array(
            'message' => 'Role Berhasil Diubah',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.role-acara', $slug)->with($notif);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return redirect()->route('roles.index')->with('success', 'Role berhasil dihapus.');
    }

    public function roleAcara($slug)
    {
        $getAcaraId = Acara::where('slug', $slug)->first();
        $roles = Role::where('acara_id', $getAcaraId->id)->get();
        $judul = $getAcaraId->nama_acara;
        // dd($soal);
        $getRole = Role::all();
        return view('Admin.role.role-index', compact('getAcaraId','roles', 'getRole', 'judul'));
    }

    public function roleTambah($id)
    {
        $dId = decrypt($id);
        $judul = Acara::findOrFail($dId);
        $acara = $dId;
        return view('Admin.role.role-form', compact('acara', 'judul'));
    }
}
