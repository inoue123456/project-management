<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientCompanyController extends Controller
{
     public function add() {
        return view('client_company.new');
    }
    
    public function create(Request $request)
    {
        $client_company = new ClientCompany;
        $client_company->fill($request->all());
        $client_company->save();
        return redirect()->back();
    }
}
