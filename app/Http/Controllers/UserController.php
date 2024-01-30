<?php

namespace App\Http\Controllers;

use App\Models\Acara;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('Admin.user.user-index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $role = Role::where('id','!=',1)->get();
        return view('Admin.user.user-form', compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|required_with:cpassword|same:cpassword',
            'role' => 'required',
        ]);


        User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role,
        ]);

        $notif = array(
            'message' => 'User Berhasil Ditambahkan',
            'alert-type' => 'success'
        );

        return redirect()->route('admin-user.index')->with($notif);
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
    public function edit(string $id)
    {

        $dId = decrypt($id);
        $edit = User::findOrFail($dId);
        $role = Role::where('id','!=',1)->get();
        return view('Admin.user.user-form', compact('edit','role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        if ($request->password != null) {
            $request->validate([
                'nama' => 'required|string|max:255',
                'email' => 'required|email|unique:users',
                'password' => 'required|string|min:8|required_with:cpassword|same:cpassword',
                'role' => 'required',
            ]);

            User::findOrFail($id)->update([
                'name' => $request->nama,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role_id' => $request->role,
            ]);
        } else {

            $request->validate([
                'nama' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email,'.$id,
                'role' => 'required'
            ]);

            User::findOrFail($id)->update([
                'name' => $request->nama,
                'email' => $request->email,
                'role_id' => $request->role,
            ]);
        }

        $notif = array(
            'message' => 'User Berhasil Diubah',
            'alert-type' => 'success'
        );

        return redirect()->route('admin-user.index')->with($notif);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function indexLp()
    {
        $acaras = Acara::where('id','!=',1)->where('status',1)->get();
        return view('index', compact('acaras'));
    }
}
