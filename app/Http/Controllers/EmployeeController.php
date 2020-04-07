<?php

namespace App\Http\Controllers;

use App\Company;
use App\Employee;
use App\Developer;
use App\Designer;
use App\Mail\CompanyNotification;
use Illuminate\Http\Request;

class EmployeeController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  Company $company
     * @return \Illuminate\Http\Response
     */
    public function create(Company $company)
    {
        return view('employees.create', [
            'company' => $company,
            'skills' => []
        ]);
    }

    /**
     * Get skills for type employee.
     *
     * @param  String $type
     * @return \Illuminate\Http\Array
     */
     public function getSkill(String $type)
     {
         return ($type == 'DEVELOPER') ? ['PHP','NET','PYTHON'] : ['GRAFICO','WEB'];
     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Company $company
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Company $company)
    {
        $validData = $request->validate([
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'age' =>  'required|regex:/[0-9]{2}/',
            'role' => 'required',
            'skill' => 'required'
        ]);

        $employee = new Employee();
        $employee->name = $validData['first_name'];
        $employee->surname = $validData['last_name'];
        $employee->age = $validData['age'];
        $employee->companies_id = $company->id;
        $employee->save();

        if($validData['role'] == 'DEVELOPER'){
            $developer = new Developer();
            $developer->lang = $validData['skill'];
            $developer->employees_id = $employee->id;
            $developer->save();
        }

        if($validData['role'] == 'DESIGNER'){
            $designer = new Designer();
            $designer->type = $validData['skill'];
            $designer->employees_id = $employee->id;
            $designer->save();
        }

        return redirect('/companies/' . $company->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Company $company
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company, $id)
    {
        $employee = Employee::where([['employees.companies_id', $company->id],['employees.id', $id]])
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
        )->first();

        return view('employees.edit', [
            'employee' => $employee,
            'company' => $company,
            'skills' => $employee->developer ? ['PHP','NET','PYTHON'] : ['GRAFICO','WEB']
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Company $company
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company, $id)
    {
        $validData = $request->validate([
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'age' => 'required|regex:/[0-9]{2}/'
        ]);

        $employee = Employee::findOrFail($id);
        $employee->name = $validData['first_name'];
        $employee->surname = $validData['last_name'];
        $employee->age = $validData['age'];
        $employee->save();

        return redirect('/companies/' . $company->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Company $company
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company, $id)
    {
        $employee = Employee::find($id);
        $employee->delete();

        return redirect('/companies/' . $company->id);
    }

    /**
     * Comfirm for remove the specified resource from storage.
     *
     * @param  Company $company
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function confirmDelete(Company $company, $id)
    {
        $employee = Employee::findOrFail($id);
        return view('employees.confirmDelete', [
            'employee' => $employee,
            'company' => $company
        ]);
    }
}