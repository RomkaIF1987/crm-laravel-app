<?php

namespace App\Http\Controllers;

use App\Company;
use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Mail\OrderShipped;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('companies.index', [
            'companies' => Company::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create', [
            'company' => new Company()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $params = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'website' => 'required|max:255',
            'logo' => 'image|max:1999|'
        ]);

        // get Extension
        $extension = $request->file('logo')->getClientOriginalExtension();

        // create new file name
        $fileNameToStore = time() . '.' . $extension;

        // save file in storage
        $request->file('logo')->storeAs('public/logo_companies', $fileNameToStore);

        $params['logo'] = $fileNameToStore;

        // create new company
        $company = Company::create($params);

        \Mail::to('romanzhyliak@gmail.com')->send(
            new OrderShipped($company)
        );

        return redirect()->route('companies.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Company $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return view('companies.show', [
            'company' => $company,
            'employees' => Employee::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Company $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('companies.edit', [
            'company' => $company
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Company $company
     * @return void
     */
    public function update(Request $request, Company $company)
    {
        $rules = [
            'name' => 'required|max:255',
            'email' => 'required|email',
            'website' => 'required|max:255',
        ];
        if ($request->hasFile('logo')) {

            $rules['logo'] = 'image|max:1999|';

            Storage::delete("public/logo_companies/$company->logo");

            $params = $request->validate($rules);

            // get Extension
            $extension = $request->file('logo')->getClientOriginalExtension();

            // create new file name
            $fileNameToStore = time() . '.' . $extension;

            // save file in storage
            $request->file('logo')->storeAs('public/logo_companies', $fileNameToStore);

            $params['logo'] = $fileNameToStore;
        } else {
            $params = $request->validate($rules);
        }

        // update company
        $company->update($params);

        return redirect()->route('companies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Company $company
     * @return void
     * @throws \Exception
     */
    public function destroy(Company $company)
    {
        $company->delete();

        return redirect()->route('companies.index');
    }
}
