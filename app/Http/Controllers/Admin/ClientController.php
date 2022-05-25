<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Clientcompany;
use App\Client;

class ClientController extends Controller
{
    public function add() {
        return view('client.new', ['client_companies'=>Clientcompany::all()]);
        
    }
    
    public function create(Request $request) {
        $this->validate($request, Client::$rules);
        $client = new Client;
        $form = $request->all();
        $client->fill($form);
        if($form["client_company_id"] === '---'){
            \Session::flash('client_company_id_err_msg', '会社名を選択してください。');
            return redirect()->back();
        }
        
    }
}
