<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index(){
        $companies=Company::get();

//        return $companies;
        return view('company.index',compact('companies'));
    }

    public function store(Request $r){
//         return auth()->user()->id;
        $company=new Company();
        $company->company_name=$r->company_name;
        $company->license=$r->license;
        $company->contact_number=$r->contact_number;
        $company->office_address=$r->office_address;
        $company->created_by=auth()->user()->id;
        $company->save();
        return back();
    }
}
