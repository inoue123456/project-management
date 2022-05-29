<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ClientCompany;

class ClientCompanyController extends Controller
{
    public function add() {
        return view('client_company.new');
    }
    
    public function create(Request $request)
    {
        $this->validate($request, Clientcompany::$rules);
        $client_company = new Clientcompany;
        $client_company->fill($request->all());
        $client_company->save();
        return redirect()->back();
    }
}
