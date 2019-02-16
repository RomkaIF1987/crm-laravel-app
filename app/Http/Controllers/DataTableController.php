<?php

namespace App\Http\Controllers;

use Yajra\Datatables\Datatables;
use App\Http\Models\Company;

class DataTableController extends Controller
{
    /**
     * @return mixed
     * @throws \Exception
     */
    public function get_datatable()
    {
        $companies = Company::select(['id', 'logo', 'name', 'email', 'website']);

        return Datatables::of($companies)
            ->addColumn('actions', function (Company $company) {
                return view('companies.partials.actions', compact('company'));
            })
            ->addColumn('name', function (Company $company) {
                return view('companies.partials.employees-show', compact('company'));
            })
            ->rawColumns(['actions', 'name'])->make();
    }

}
