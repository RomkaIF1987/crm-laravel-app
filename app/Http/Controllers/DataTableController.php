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

        return Datatables::of($companies)->make();
    }

}
