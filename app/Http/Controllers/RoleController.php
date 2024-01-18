<?php

namespace App\Http\Controllers;

use App\Models\Role;
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
            'role' => 'required|unique:roles',
        ]);

        Role::create(['role' => $request->role]);

        $notif = array(
            'message' => 'Role Berhasil Ditambah',
            'alert-type' => 'success'
        );

        return redirect()->route('admin-roles.index')->with($notif);
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
}
