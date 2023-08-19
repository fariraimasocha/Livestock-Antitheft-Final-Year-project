<?php

namespace App\Tables;

use App\Models\Livestock;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\SpladeTable;
use Maatwebsite\Excel\Excel;
use ProtoneMedia\Splade\Table\LaravelExcelException;

class Livestocks extends AbstractTable
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
        return Livestock::query();
    }

    /**
     * Configure the given SpladeTable.
     *
     * @param SpladeTable $table
     * @return void
     * @throws LaravelExcelException
     */
    public function configure(SpladeTable $table)
    {
        $table
            ->withGlobalSearch(columns: ['id', 'name', 'tag_no','gender', 'color', 'dob'])
            ->column('id', sortable: true)
            ->column('name', sortable: true)
            ->column('tag_no', sortable: true)
            ->column('gender', sortable: true)
            ->column('color', sortable: true)
            ->column('dob', sortable: true)
            ->column(label:'actions', exportAs: false)
            ->export()
            ->bulkAction(
                label: 'Delete Selected',
                each: fn (Livestock $livestock) => $livestock->delete(),
                after: fn () => Toast::info('Animals deleted successfully!'),
                confirm: 'Are you sure you want to delete the selected items',
                confirmButton: 'Delete',
                cancelButton: 'Cancel'
            )
            ->paginate(8);
    }
}


