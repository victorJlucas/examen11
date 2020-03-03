<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();

        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::pluck('name', 'id');
        $role = new Role;
        return view('admin.roles.create', compact('role', 'permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'name' => 'required | unique:roles',
            'guard_name' => 'required',
            'display_name' => 'required | unique:roles',
        ]);

        $role = Role::create($data);

        if ($request->has('permissions')) {
            $role->givePermissionTo($request->permissions);
        }

        return redirect()->route('admin.roles.index')
            ->withFlash('El rol ha sido creado satisfactoriamente');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permissions = Permission::pluck('name', 'id');

        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $data = $this->validate($request, [
            'name' => 'unique:roles,name,' . $role->id,
            'guard_name' => 'required',
            'display_name' => 'required | unique:roles',
        ]);

        $role->update($data);

        $role->permissions()->detach();

        if ($request->has('permissions')) {
            $role->givePermissionTo($request->permissions);
        }

        return redirect()->route('admin.roles.index')
            ->withFlash('El rol ha sido actualizado correctamente');
    }

    public function destroy(Role $role)
    {
        //$this->authorize('delete', $role);

        $role->delete();

        return redirect()->route('admin.roles.index')
            ->withFlash('El usuario ' . $role->name . ' ha sido eliminado');
    }
}
