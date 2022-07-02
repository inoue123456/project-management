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
        if ($search_name) {
            $clients = Client::where('name', $search_name)->get();
        } else {
              $clients = Client::all();
        }
        return view('client.index', compact(['clients', 'search_name']));
    }
    
    public function edit(Client $client) {
        return view('client.edit', compact('client'));
    }
    
    public function update(Request $request)
    {
        $this->validate($request, Client::$client_rules);
      
        $client_form = $request->all();
        $client->fill($client_form)->save();
        return redirect()->back();
    }
    
    public function delete(Request $request, Client $client)
    {
        $client->delete();
        return redirect()->back();
    }
}
