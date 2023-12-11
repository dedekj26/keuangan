<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $role = Role::all();

        return view('role.index', compact('role'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permission = Permission::all();
        return view('role.create', compact('permission'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $role = Role::create([
            'name' => $request->name,
        ]);

        $role->syncPermissions($request->permission);

        return redirect(route('role.index'))->withSuccess('Role baru berhasil dibuat');
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
    public function edit(Role $role)
    {
        $permission = Permission::all();
        return view('role.edit', compact('role', 'permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $role->update([
            'name' => $request->name,
        ]);

        $role->syncPermissions($request->permission);

        return redirect(route('role.index'))->withSuccess('Role berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect(route('role.index'))->withSuccess('Role berhasil dihapus');
    }
}
