@extends('layouts.app')
@section('title', 'プロジェクト詳細')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h2>プロジェクト詳細</h2>
        <table class="table table-striped">
          <tbody>
            <tr>
              <th scope="row">プロジェクト名</th>
              <td>{{ $project->name }}</td>
            </tr>
            <tr>
              <th scope="row">顧客会社</th>
              <td>{{ $project->client_id }}</td>
            </tr>
            <tr>
              <th scope="row">契約日</th>
              <td>{{ $project->contract_date }}</td>
            </tr>
            <tr>
              <th scope="row">納期</th>
              <td>{{ $project->deadline_date }}</td>
            </tr>
            <tr>
              <th scope="row">担当者</th>
              <td>{{ $project->user_id }}</td>
            </tr>
            <tr>
              <th scope="row">タスク進捗状況</th>
              <td>{{ $project->task->task_name}}：{{ $project->task->progress}}</td>
            </tr>
          </tbody>
        </table>
    </div>
</div>
</div>
@endsection