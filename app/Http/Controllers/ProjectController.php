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
        $company_name = $request->company_name;
        if(!ClientCompany::where('company_name', $company_name)->exists()) {
            $client_company->company_name = $company_name;
            $client_company->save();
        };
        
        $client = new Client;
        $client_form = $request->only(['client_name', 'email', 'phone_number']);
        if(!Client::where('email', $client_form ['email'])->exists()) {
            $client->fill($client_form);
            $client->client_company_id = ClientCompany::where('company_name', $company_name)->first()->id;
            $client->save();
        }
        
        $project = new Project;
        $project->fill($request->only(['name','contract_date', 'deadline_date']));
        $project->user_id = Auth::id();
        $project->client_id = Client::where('email', $client_form ['email'])->first()->id;
        $project->save();
        
        $user_names = $request->get('user_name', []);
        
        foreach($user_names as $user_name) {
            if($user_name) {
                $user_ids[] = User::where('name', $user_name)->first()->id;
            }
        }
        $project->users()->sync($user_ids);
        
        /*
        パターン2
        $user_names = $request->get('user_name', []);
        dd($user_names);
        foreach($user_names as $user_name) {
            if($user_name) {
                $user_id = User::where('name', $user_name)->first()->id;
                $project->users()->attach([$user_id]);
            }
        }
        
        以下を上の内容に改善
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
        //*/
        return redirect()->back();
    }
    
   public function index(Request $request)
    {
        $search_project_name = $request->search_project_name;
        $seach_query = Project::query();
        if($search_project_name) {
            $seach_query->where('name', $search_project_name);
            $projects = $seach_query->get();
        }
        return view('project.index', ['projects'=> $projects, 'search_project_name' => $search_project_name]);
    }
    
    public function edit(Request $request, Project $project)
    {
        //$project = Project::find($request->id);
        if (empty($project)) {
        abort(404);
        }
        //$users = Project::with('users')->get();
    
        return view('project.edit', compact('project'));
    }
    
    public function update(Request $request)
    {
        $this->validate($request, Project::$project_rules);
      
        $project = Project::find($request->id);
        $project_form = $request->all();
        $project->fill($project_form)->save();
        
        $user_names = $request->get('user_name', []);
        foreach($user_names as $user_name) {
            if($user_name) {
                $user_ids[] = User::where('name', $user_name)->first()->id;
            }
        }
        $project->users()->sync($user_ids);
        $search_project_name = $request->search_project_name;
        return view('project.index', ['projects'=> Project::all(), 'search_project_name' => $search_project_name]);
       
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
