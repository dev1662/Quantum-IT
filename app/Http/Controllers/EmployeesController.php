<?php

namespace App\Http\Controllers;

use App\Models\Comapany;
use App\Models\Employees;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check() === true) {
            $company = Employees::all();
            return view('employees.index', compact('company'));
            # code...
        }else{
            return redirect('/');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check() === true) {
            $company = Comapany::all();
            return view('employees.add', compact('company'));
            # code...
        }else{
            return redirect('/');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate(['firstName' => 'required', 'lastName' => 'required']);
        $employees = new Employees();
        $employees->firstName = $request->firstName;
        $employees->lastName = $request->lastName;
        $employees->email = $request->email;
        $employees->phone = $request->phone;
        $employees->company_id = $request->company_id;
        $employees->save();
        return redirect('employees-show');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Employees $employees)
    {
        if (Auth::check() === true) {
            $company = Comapany::all();
            return view('employees.edit', compact('employees', 'company'));
            # code...
        }else{
            return redirect('/');
        }
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
        $request->validate(['firstName' => 'required', 'lastName' => 'required']);
        $employees =  Employees::find($id);
        $employees->firstName = $request->firstName;
        $employees->lastName = $request->lastName;
        $employees->email = $request->email;
        $employees->phone = $request->phone;
        $employees->company_id = $request->company_id;
        $employees->update();
        return redirect('employees-show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employees::find($id)->delete();
        return redirect('employees-show');
    }
}
