<?php

namespace App\Http\Controllers;

use App\Company;
use App\Employee;
use App\Mail\CompanyNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CompanyController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('companies.index', [
            'companies' => Company::paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validData = $request->validate([
            'name' => 'required|min:3'
        ]);

        $company = new Company();
        $company->name = $validData['name'];
        $company->save();

        return redirect('/companies');
    }

    /**
     * Display the specified resource.
     *
     * @param  Company $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        $employees = Employee::where('employees.companies_id', $company->id)
        ->leftJoin('developers', 'employees.id', '=', 'developers.employees_id')
        ->leftJoin('designers', 'employees.id', '=', 'designers.employees_id')
        ->select(
            'employees.id',
            'employees.name',
            'employees.surname',
            'employees.age',
            'developers.id as developer',
            'developers.lang as lang',
            'designers.id as designer',
            'designers.type as type'
        )->paginate(5);

        $average = Employee::where('companies_id', $company->id)->pluck('age')->avg();
        
        return view('companies.show', [
            'company' => $company,
            'employees' => $employees,
            'average' => $average
        ]);
    }

    /**
     * Search for resource specific.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Company $company
     * @return \Illuminate\Http\Response
     */
     public function search(Request $request, Company $company)
     {
         $validData = $request->validate([
             'employee_id' =>  'required|regex:/[0-9]/',
         ]);

         $employees = Employee::where([['employees.companies_id', $company->id],['employees.id', $validData['employee_id']]])
        ->leftJoin('developers', 'employees.id', '=', 'developers.employees_id')
        ->leftJoin('designers', 'employees.id', '=', 'designers.employees_id')
        ->select(
            'employees.id',
            'employees.name',
            'employees.surname',
            'employees.age',
            'developers.id as developer',
            'developers.lang as lang',
            'designers.id as designer',
            'designers.type as type'
        )->paginate(5);

        $average = Employee::where('companies_id', $company->id)->pluck('age')->avg();
        
        return view('companies.show', [
            'company' => $company,
            'employees' => $employees,
            'average' => $average
        ]);
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::findOrFail($id);
        return view('companies.edit', [
            'company' => $company
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validData = $request->validate([
            'name' => 'required|min:3',
        ]);

        $company = Company::findOrFail($id);
        $company->name = $validData['name'];
        $company->save();

        return redirect('/companies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::find($id);
        $company->delete();

        return redirect('/companies');
    }

    public function confirmDelete($id) {
        $company = Company::findOrFail($id);
        return view('companies.confirmDelete', [
            'company' => $company
        ]);
    }
}