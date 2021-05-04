<?php

namespace App\Http\Controllers;
use App\Models\Companies;
use Illuminate\Http\Request;

class CompaniesController extends Controller
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
        $companies = Companies::paginate(10);
        $compCount = $companies->count();
        return view('companies.companies', compact('companies', 'compCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('companies.create_companies');
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
            'name' => 'required',
        ]);

        Companies::create($request->all());

        return redirect('/companies')->with('create', 'Companies successfully added.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Companies $companies)
    {
        return view('companies.edit_companies', compact('companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Companies $companies)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Companies::where('id', $companies->id)
            ->update([
                'name' => $request->name,
                'email' => $request->email,
                'website' => $request->website,
            ]);
        
            return redirect('/companies')->with('edit', 'Companies successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Companies $companies)
    {
        Companies::destroy($companies->id);
        return redirect('/companies')->with('delete', 'Companies successfully deleted.');
    }
}