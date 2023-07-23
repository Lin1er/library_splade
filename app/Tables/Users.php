<?php

namespace App\Tables;

use App\Models\User;
use App\Models\Kelas;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;

class Users extends AbstractTable
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
        return User::query();
    }

    /**
     * Configure the given SpladeTable.
     *
     * @param \ProtoneMedia\Splade\SpladeTable $table
     * @return void
     */
    public function configure(SpladeTable $table)
    {
        $table
            ->withGlobalSearch(columns: ['name', 'email'])
            ->column('id', sortable: true)
            ->column('name')
            ->column('username')
            ->column('Kelas.nama_kelas', 'kelas')
            ->column('email')
            ->column('actions', exportAs: false)
            ->paginate(15)
            // ->selectFilter(
            //     key: 'kelas.nama_kelas',
            //     options: [
            //         'X' => 'X',
            //         'XI' => 'XI',
            //         'XII' => 'XII',
            //     ],
            //     label: 'Kelas',
            //     noFilterOption: true,
            //     noFilterOptionLabel: 'Semua Kelas'
            // )


            ->export();
    }
}
