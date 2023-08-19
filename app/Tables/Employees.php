<?php

namespace App\Tables;

use App\Models\Employee;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;
use ProtoneMedia\Splade\Facades\Toast;

class Employees extends AbstractTable
{
    /**
     * Create a new instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the user is authorized to perform bulk actions and exports.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {
        return true;
    }

    /**
     * The resource or query builder.
     *
     * @return mixed
     */
    public function for()
    {
        return Employee::query();
    }

    /**
     * Configure the given SpladeTable.
     *
     * @param SpladeTable $table
     * @return void
     */
    public function configure(SpladeTable $table)
    {
        $table
            ->withGlobalSearch(columns: ['id', 'name', 'age', 'id_number', 'phone_number'])
            ->column('id', sortable: true)
            ->column('name', sortable: true)
            ->column('age', sortable: true)
            ->column('id_number', sortable: true)
            ->column('salary', sortable: true)
            ->column('phone_number', sortable: true)
            ->column(label:'actions', exportAs: false)
            ->export()
            ->bulkAction(
                label: 'Delete Selected',
                each: fn (Employee $employee) => $employee->delete(),
                after: fn () => Toast::info('Employees deleted successfully!'),
                confirm: 'Are you sure you want to delete the selected items',
                confirmButton: 'Delete',
                cancelButton: 'Cancel'
            )
            ->paginate(8);
    }
}
