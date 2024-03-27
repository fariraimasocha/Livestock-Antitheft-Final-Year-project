<?php

namespace App\Http\Controllers;


use App\Models\Livestock;
use App\Models\Employee;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::all();
        $obooks = Role::all();
        $reports = Employee::all();
        $roles = Role::all();
        $permissions = Permission::all();
        $assessments = Livestock::all();

        return view('dashboard.index',compact('reports', 'roles', 'permissions', 'assessments','users', 'obooks'));
    }
}
