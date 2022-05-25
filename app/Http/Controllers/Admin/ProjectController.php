<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Project;
use Carbon\Carbon;
use Auth;
use App\Clientcompany;
use App\Client;

class ProjectController extends Controller
{
    public function add() {
        return view('project.new');
    }
    public function create(Request $request)
    {
        $this->validate($request, Project::$rules);
        
        $client_company = new Clientcompany;
        $client_company_form = $request->only(['company_name']);
        $client_company->fill($client_company_form);
        $client_company->save();
        
        /* 同じフォームから複数のテーブルに保存
        ついでに他のテーブルからidも取得
        参照 https://wayasblog.com/laravel-db-save/
        //*/
        $company_id = $client_company->id;
        $client = new Client;
        $client_form = $request->only(['client_name', 'e-mail', 'phone_number']);
        $client->fill($client_form);
        $client->client_company_id = $company_id;
        $client->save();
        
        $client_id = $client->id;
        $project = new Project;
        $form = $request->only(['name','contract_date', 'deadline_date']);
        $project->fill($form);
        $project->user_id = Auth::id();
        $project->client_id = $client_id;
        $project->save();
        return redirect()->back();
    }
    
   public function index()
    {
        return view('project.index', ['projects'=> Project::all()]);
    }
    
    public function edit(Request $request)
    {
        $project = Project::find($request->id);
        if (empty($project)) {
        abort(404);    
      }
        return view('project.edit', ['project'=> $project]);
    }
    
    public function update(Request $request)
    {
        $this->validate($request, Project::$rules);
      
        $project = Project::find($request->id);
        $project_form = $request->all();
        $project->fill($project_form)->save();

        return view('project.index', ['projects'=> Project::all()]);
       
    }
    
    public function delete(Request $request)
    {
        $project = Project::find($request->id);
        $project->delete();
        return redirect()->back();
    }
    
    
}
