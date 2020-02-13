<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewCompanyMail;

class CompanyController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $companies = Company::OrderBy('id', 'desc')->paginate(10);
        return view('home', ['companies' => $companies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('new_company');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string',
            'email' => 'nullable|string|email',
            'logo' => 'nullable|mimes:jpeg,jpg,png',
            'website' => 'nullable|url',
        ]);
//        dd($request->all());
        $save_name = null;
        if ($request->has('logo')) {
            $logo = $request->file('logo');
            $logo_name = $logo->getClientOriginalName();
            $save_name = time() . $logo_name;
            Storage::disk('public')->putFileAs('logos', $logo, $save_name);
        }
        $create = [
            'name' => $request->name,
            'email' => $request->email,
            'website' => $request->website,
            'logo' => $save_name,
        ];
        config(['mail.from.address' => $request->email ?? "keroles@examole.com"]);
        Company::create($create);
        Mail::to('example@gmail.com')->send(new NewCompanyMail);

        return redirect()->to('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company) {
        return view('update_company', ['company' => $company]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,Company $company) {
        $request->validate([
            'name' => 'required|string',
            'email' => 'nullable|string|email',
            'logo' => 'nullable|mimes:jpeg,jpg,png',
            'website' => 'nullable|url',
        ]);
//        dd($request->all());
        $save_name = null;
        if ($request->has('logo')) {
            $logo = $request->file('logo');
            $logo_name = $logo->getClientOriginalName();
            $save_name = time() . $logo_name;
            Storage::disk('public')->putFileAs('logos', $logo, $save_name);
        }
        $update = [
            'name' => $request->name,
            'email' => $request->email,
            'website' => $request->website,
            'logo' => $save_name ?? $company->logo,
        ];
        $company->update($update);
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company) {
        $company->delete();
        return redirect()->back();
    }

    public function employees(Company $company) {
        $employees = $company->employees;
        return view('employees', ['employees' => $employees]);
    }

}
