<?php

namespace App\Http\Controllers;

use App\Http\Models\Company;
use App\Http\Requests\CompanyRequest;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Mail\OrderShipped;

class CompaniesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['only' => ['create', 'store', 'edit', 'delete']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function index()
    {
        return view('companies.index', [
            'companies' => Company::paginate(5)
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
     * @param CompanyRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        $params = $request->validated();

        // get Extension
        $extension = $request->file('logo')->getClientOriginalExtension();

        // create new file name
        $fileNameToStore = time() . '.' . $extension;

        // save file in storage
        $request->file('logo')->storeAs('public/logo_companies', $fileNameToStore);

        $params['logo'] = $fileNameToStore;

        $company = Company::create($params);

        Mail::to('romanzhyliak@gmail.com')->send(
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
            'company' => $company
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CompanyRequest $request, Company $company)
    {
        $params = $request->validated();

        if ($request->hasFile('logo')) {
            Storage::delete("public/logo_companies/$company->logo");

            // get Extension
            $extension = $request->file('logo')->getClientOriginalExtension();

            // create new file name
            $fileNameToStore = time() . '.' . $extension;

            // save file in storage
            $request->file('logo')->storeAs('public/logo_companies', $fileNameToStore);

            $params['logo'] = $fileNameToStore;
        }

        $company->update($params);

        return redirect()->route('companies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Company $company
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Company $company)
    {
        $company->delete();
        $company->employees()->delete();

        return redirect()->route('companies.index');
    }
}
