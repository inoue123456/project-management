<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Clientcompany;
use App\Client;
use Auth;

class ClientController extends Controller
{
    public function index(Request $request) {
        $search_name = $request->search_name;
        $search_query = Client::query();
        if ($search_name) {
            $search_query->where('name', $search_name);
        }
        $clients = $search_query->get();
        return view('client.index', compact('clients', 'search_name'));
    }
    
    public function showDetail(Client $client)
    {
        return view('client.detail', compact('client'));
    }
    
    public function edit(Client $client) {
        return view('client.edit', compact('client'));
    }
    
    public function update(Request $request)
    {
        $this->validate($request, Client::$client_rules);
      
        $client->fill($request->all())->upadate();
        return redirect()->back();
    }
    
    public function delete(Request $request, Client $client)
    {
        $client->delete();
        return redirect()->back();
    }
    
}
