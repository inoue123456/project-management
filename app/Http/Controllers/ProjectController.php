<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Project;
use Carbon\Carbon;
use Auth;
use App\ClientCompany;
use App\Client;
use App\Task;
use App\User;

class ProjectController extends Controller
{
    public function add() {
        return view('project.new', ['users'=> User::all()]);
    }
    public function create(Request $request)
    {
        $validation = array_merge(Project::$project_rules, Client::$client_rules, ClientCompany::$client_company_rule);
        $this->validate($request, $validation);
        
        $client_company = new ClientCompany;
        $client_company_form = $request->only(['company_name']);
        $company_name = $client_company_form ['company_name'];
        
        if(!ClientCompany::where('company_name', $client_company_form)->exists()) {
            $client_company->fill($client_company_form);
            $client_company->save();
        };
        
        $picked_company = ClientCompany::where('company_name', $client_company_form)->first();
        $company_id = $picked_company->id;
        $client = new Client;
        $client_form = $request->only(['client_name', 'email', 'phone_number']);
        $client_email = $client_form ['email'];

        if(!Client::where('email', $client_email)->exists()) {
            $client->fill($client_form);
            $client->client_company_id = $company_id;
            $client->save();
        }
        
        $picked_client = Client::where('email', $client_email)->first();
        
        $client_id = $picked_client->id;
        $project = new Project;
        $form = $request->only(['name','contract_date', 'deadline_date']);
        $project->fill($form);
        $project->user_id = Auth::id();
        $project->client_id = $client_id;
        $project->save();
        
        /*$user_names = $request->get('user_names', []);
        if (in_array(null, $user_names, true)) {
            $user_names_null_delete = array_diff($user_names, array(null));
            $user_names_null_delete = array_values($user_names_null_delete);
            $project->users()->sync($user_names_null_delete);
        } else {
            $project->users()->sync($request->get('user_names', []));
        }
        //$project->users()->sync($request->get('user_names', []));
        //*/
        
        //以下改善必要
        $user_name1 = $request->get('user_name1');
        $user1 = User::where('name', $user_name1)->first();
        
        $user_name2 = $request->get('user_name2');
        $user_name3 = $request->get('user_name3');
        
        if($user_name2 == null && $user_name3 == null) {
            $project->users()->sync($user1->id);
        } elseif($user_name3 == null) {
            $user2 = User::where('name', $user_name2)->first();
            $project->users()->sync([$user1->id, $user2->id]);
        } elseif ($user_name2 == null) {
            $user3 = User::where('name', $user_name3)->first();
            $project->users()->sync([$user1->id, $user3->id]);
        } 
        
        return redirect()->back();
    }
    
   public function index()
    {
        return view('project.index', ['projects'=> Project::all()]);
    }
    
    public function edit(Request $request, Project $project)
    {
        //$project = Project::find($request->id);
        if (empty($project)) {
        abort(404);    
      }
        return view('project.edit', ['project'=> $project]);
    }
    
    public function update(Request $request)
    {
        $this->validate($request, Project::$project_rules);
      
        $project = Project::find($request->id);
        $project_form = $request->all();
        $project->fill($project_form)->save();

        return view('project.index', ['projects'=> Project::all()]);
       
    }
    
    public function delete(Request $request, Project $project)
    {
        //$project = Project::find($request->id);
        $project->delete();
        return redirect()->back();
    }
    
    
    public function showgantt()
    {
        return view('project.gantt', ['tasks' => Task::all()]);
    }
    
    
    
}
