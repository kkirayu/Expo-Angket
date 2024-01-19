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
            'role' => 'required',
        ]);

        $acara = Acara::findOrFail($request->acara);
        $slug = $acara->slug;

        Role::create(['role' => $request->role, 'acara_id' => $request->acara]);

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

        return view('Admin.role.role-form', compact('edit'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'role' => 'required|unique:roles,role,' . $id,
        ]);

        Role::findOrFail($id)->update(['role' => $request->role]);

        $notif = array(
            'message' => 'Role Berhasil Diubah',
            'alert-type' => 'success'
        );

        return redirect()->route('admin-roles.index')->with($notif);
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
