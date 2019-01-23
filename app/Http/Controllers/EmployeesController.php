<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Http\Models\Company;
use App\Http\Models\Employee;

class EmployeesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param $companyId
     * @return \Illuminate\Http\Response
     */
    public function create($companyId)
    {
        return view('employees.create', [
            'employee' => new Employee(),
            'company_id' => $companyId
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param EmployeeRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        $params = $request->validated();

        Employee::create($params);

        return redirect('/companies/' . $request->get('company_id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Employee $employee
     * @param Company $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee, Company $company)
    {
        return view('employees.edit', [
            'employee' => $employee,
            'company' => $company,
            'companies' => Company::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EmployeeRequest $request
     * @param Employee $employee
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(EmployeeRequest $request, Employee $employee)
    {
        $params = $request->validated();

        $employee->update($params);

        return redirect('/companies/' . $request->get('company_id'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Employee $employee
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();

        return back();
    }
}
