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
        $role = Role::all();
        return view('Admin.roleTable', compact('role'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();

        return view('Admin.roleCreate', compact('roles'));
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

        return redirect()->back()->with('success', 'Role berhasil ditambahkan.');
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
        $role = Role::findOrFail($id);

        return view('Admin.editRole', compact('role'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'role' => 'required|unique:roles,role,' . $id,
        ]);

        $role = Role::findOrFail($id);
        $role->update(['role' => $request->role]);

        return redirect()->route('roles.index')->with('success', 'Role berhasil diperbarui.');
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
