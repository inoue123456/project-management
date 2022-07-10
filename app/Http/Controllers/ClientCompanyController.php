<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ClientCompany;
use Auth;

class ClientCompanyController extends Controller
{
   public function index(Request $request) {
        $search_name = $request->search_name;
        $search_query = ClientCompany::query();
        if ($search_name) {
            $search_query->where('name', $search_name);
            $client_companies = $search_query->get();
        }
        return view('client_company.index', compact(['client_companies', 'search_name']));
    }
    
    public function edit(ClientCompany $client_company) {
        return view('client_company.edit', compact('client_company'));
    }
    
    public function update(Request $request)
    {
        $this->validate($request, ClientCompany::$client_company_rule);
      
        $client_company_form = $request->all();
        $client_company->fill($client_company_form)->save();
        return redirect()->back();
    }
    
    public function delete(Request $request, ClientCompany $client_company)
    {
        $client_company->delete();
        return redirect()->back();
    }
}
