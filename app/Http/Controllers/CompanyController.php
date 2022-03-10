<?php

namespace App\Http\Controllers;

use App\Models\Comapany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check() === true) {
            $company = Comapany::all();
            return view('company-show', compact('company'));
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
            // $company = Comapany::all();
            return view('add-company');
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
    public function store(Request $req)
    {
        // dd($req->all());
        $logo = request('logo')->store('uploads', 'public');
        $req->validate(['name' => 'required', 'email' => '
        email', 'logo' => 'required|image|dimensions:width=178,height=100']);
        $company = new Comapany();
        $company->name = $req->name;
        $company->email = $req->email;
        $company->logo = $logo;
        $company->website = $req->website;
        $company->save();
        return redirect('company-show');

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Comapany $company)
    {
        if (Auth::check() === true) {
            // $company = Comapany::all();
            return view('edit-company', compact('company'));
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
    public function update(Request $req, $id)
    {
        // dd($request->all());
        $logo = request('logo')->store('uploads', 'public');
        $req->validate(['name' => 'required', 'email' => 'required|
        email', 'logo' => 'required|image|dimensions:width=178,height=100', 'website' => 'required']);
        $company =  Comapany::find($id);
        $company->name = $req->name;
        $company->email = $req->email;
        $company->logo = $logo;
        $company->website = $req->website;
        $company->update();
        return redirect('company-show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Comapany::find($id)->delete();
        return redirect('company-show');
    }
}
