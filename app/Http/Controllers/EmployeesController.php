<?php

namespace App\Http\Controllers;

use App\Company;
use App\Employee;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param $company_id
     * @return \Illuminate\Http\Response
     */
    public function create($company_id)
    {
        return view('employees.create', [
            'employee' => new Employee(),
            'company_id' => $company_id
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Company $company
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Company $company)
    {
        $params = $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'required',
            'company_id' => 'required'
        ]);

        // create new company
        $employee = Employee::create($params);

        return redirect('/companies/' . $request->input('company_id'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee $employees
     * @return void
     */
    public function show(Employee $employees)
    {
        //
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
     * @param  \Illuminate\Http\Request $request
     * @param Employee $employee
     * @return void
     */
    public function update(Request $request, Employee $employee)
    {
        $params = $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'required',
            'company_id' => 'required'
        ]);

        // create new employee
        $employee->update($params);

        return redirect('/companies/' . $request->input('company_id'));
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
