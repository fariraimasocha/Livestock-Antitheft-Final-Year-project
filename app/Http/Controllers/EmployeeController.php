<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Tables\Employees;
use ProtoneMedia\Splade\Facades\Toast;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('employee.index',[
            'employees' => Employees::class,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeRequest $request)
    {
        Employee::create($request->validated());

        Toast::title('Success!')
            ->message('Employee Created Successfully!')
            ->success()
            ->leftTop()
            ->info()
            ->backdrop()
            ->autoDismiss(3);

        return redirect()->route('employees.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        return view('employee.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $employee->update($request->validated());

        Toast::title('Success!')
            ->message('Employee Updated Successfully!')
            ->success()
            ->leftTop()
            ->info()
            ->backdrop()
            ->autoDismiss(3);

        return redirect()->route('employees.index');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();

        Toast::title('Success!')
            ->message('Employee Deleted Successfully!')
            ->success()
            ->leftTop()
            ->info()
            ->backdrop()
            ->autoDismiss(3);

        return redirect()->route('employees.index');
    }
}
