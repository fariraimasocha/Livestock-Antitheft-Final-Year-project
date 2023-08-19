<?php

namespace App\Http\Controllers;

use App\Tables\Permissions;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Toast;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('permissions.index',
        [
            'permissions' => Permissions::class,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('permissions.create', []);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Permission::create(['name' => $request->name]);

        Toast::title('Success!')
            ->message('Permission Created Successfully!')
            ->success()
            ->info()
            ->leftTop()
            ->backdrop()
            ->autoDismiss(3);

        return redirect()->route('permissions.index');
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
    public function edit(Permission $permission)
    {
        return view('permissions.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permission $permission)
    {
        $permission->update(['name' => $request->name]);

        Toast::title('Success!')
            ->message('Permission Updated Successfully!')
            ->success()
            ->info()
            ->leftTop()
            ->backdrop()
            ->autoDismiss(3);

        return redirect()->route('permissions.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();

        Toast::title('Success!')
            ->message('Permission Deleted Successfully!')
            ->warning()
            ->info()
            ->leftTop()
            ->backdrop()
            ->autoDismiss(3);

        return redirect()->route('permissions.index');
    }
}
