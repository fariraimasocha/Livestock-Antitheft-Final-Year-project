<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateRoleRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use ProtoneMedia\Splade\Facades\Toast;
use App\Tables\Roles;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('roles.index',
        [
            'roles' => Roles::class,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::all();
        $roles = Role::all();

        return view('roles.create', [
            'permissions' => $permissions,
            'roles' => $roles,
        ]);
    }

    public function store(Request $request)
    {
        $role = Role::create(['name' => $request->name]);

        $role->syncPermissions($request->permissions);

        Toast::title('Success!')
            ->message('Role Created Successfully!')
            ->success()
            ->info()
            ->leftTop()
            ->backdrop()
            ->autoDismiss(3);

        return redirect()->route('roles.index');
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();

        return view('roles.edit', compact('role', 'permissions'));
    }

    public function update(UpdateRoleRequest $request, Role $role)
    {
        $role->update([
            'name' => $request->name,
        ]);

        $role->syncPermissions($request->permissions);

        Toast::title('Success!')
            ->message('Role Updated Successfully!')
            ->success()
            ->info()
            ->leftTop()
            ->backdrop()
            ->autoDismiss(3);

        return redirect()->route('roles.index');
    }

    public function destroy(Role $role)
    {
        $role->delete();

        Toast::title('Success!')
            ->message('Role Deleted Successfully!')
            ->success()
            ->info()
            ->leftTop()
            ->backdrop()
            ->autoDismiss(3);

        return redirect()->route('roles.index');
    }
}
