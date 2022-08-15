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
        $users_in_department = User::where('department_id', Auth::user()->department_id)->get();
        return view('project.new', compact('users_in_department'));
    }
    
    public function create(Request $request) {
        
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
        
        $user_ids = $request->user_ids;
        if($user_ids === ['---','---']) {
            \Session::flash('err_msg', '担当者を選択してください。');
        }else {
            foreach($user_ids as $user_id) {
                if(is_numeric($user_id)) {
                    $project->users()->sync($user_id);
                    $user = User::find($user_id);
                    $user->notify(new ProjectRegister($project));
                }
            }
        }
        return redirect()->back();
    }
    
   public function index(Request $request) {
        $search_project_name = $request->search_project_name;
        $seach_query = Project::query();
        if($search_project_name) {
            $seach_query->where('name', $search_project_name);
        }
        $projects = $seach_query->get();
        return view('project.index', compact('projects', 'search_project_name'));
    }
    
    public function edit(Request $request, Project $project) {
        if (empty($project)) {
            abort(404);
        }
        
        $users_in_department = Auth::user()->department->users;
        return view('project.edit', compact('project', 'users_in_department'));
    }
    
    public function update(Request $request) {
        $this->validate($request, Project::$project_rules);
      
        $project = Project::find($request->id);
        $project_form = $request->all();
        $project->fill($project_form)->save();
        
        $user_ids = $request->user_ids;
        $project->users()->sync($user_ids);
        return redirect()->back();
    }

    public function showDetail(Project $project) {
        $tasks = Task::where('project_id', $project->id)->get();
        $users = $project->users()->orderBy('name')->get();
        return view('project.detail', compact('project', 'tasks', 'users'));
    }

    public function delete(Request $request, Project $project){
        $project->delete();
        return redirect()->back();
    }
}
