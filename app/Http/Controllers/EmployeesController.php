<?php

namespace App\Http\Controllers;
use App\Models\Employees;
use App\Models\Companies;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $employees = Employees::with('companies')->paginate(10);
        $empCount = $employees->count();
        return view('employees.employees', compact('employees', 'empCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Companies::all();
        return view('employees.create_employees', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
        ]);

        Employees::create($request->all());

        return redirect('/employees')->with('create', 'Employees successfully added.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Employees $employees)
    {
        $companies = Companies::all();
        return view('employees.edit_employees', compact('employees', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employees $employees)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
        ]);

        Employees::where('id', $employees->id)
            ->update([
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'id_companies' => $request->id_companies,
                'email' => $request->email,
                'phone' => $request->phone,
            ]);
        
            return redirect('/employees')->with('edit', 'Employees successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employees $employees)
    {
        Employees::destroy($employees->id);
        return redirect('/employees')->with('delete', 'Employees successfully deleted.');
    }
}