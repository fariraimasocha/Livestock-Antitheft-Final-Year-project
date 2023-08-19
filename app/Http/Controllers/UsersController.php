<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Tables\Users;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdaterequest;
use Spatie\Permission\Models\Role;
use ProtoneMedia\Splade\Facades\Toast;

class UsersController extends Controller
{
    public function index(){

        return view('users.index',
        [
            'users' => Users::class,
        ]);
    }

    public function create()
    {
        $roles = Role::all();

        return view('users.create', [
            'roles' => $roles,
        ]);
    }

    public function store(UserStoreRequest $request)
    {
        $user = User::create($request->validated());

        $user->syncRoles($request->roles, []);

        Toast::title('Success!')
            ->message('User Created Successfully!')
            ->success()
            ->info()
            ->leftTop()
            ->backdrop()
            ->autoDismiss(3);
        return redirect()->route('users.index');
    }

    public function edit(User $user)
    {
        $roles = Role::all();

        return view('users.edit', [
            'user' => $user,
            'roles' => $roles,
        ]);
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        $data = $request->validated();

        if (empty($data['password'])) {
            unset($data['password']);
        }

        $user->update($data);

        $user->syncRoles($request->roles, []);

        Toast::title('Success!')
            ->message('User Updated Successfully!')
            ->success()
            ->leftTop()
            ->info()
            ->backdrop()
            ->autoDismiss(3);
        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();

        Toast::title('warning!')
            ->message('User Deleted Successfully!')
            ->success()
            ->leftTop()
            ->backdrop()
            ->autoDismiss(3);
        return redirect()->route('users.index');
    }

}
