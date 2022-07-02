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
                $user_id = User::where('name', $user_name)->first()->id;
                $project->users()->attach([$user_id]);
            }
        }
        
        /*
        ※attach()は登録内容が重複してもOK (上のようにforeachで同じidでいくつか登録するときに使える)
        一方sync()は重複しても最後の値だけ登録(上だといくつかあるuser_nameから抽出されたuser_idの最後に抽出したuser_idだけ登録される)
        
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
        if($search_project_name) {
            $projects = Project::where('name', $search_project_name)->get();
        } else {
            $projects = Project::all();
        }
        return view('project.index', ['projects'=> $projects, 'search_project_name' => $search_project_name]);
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
