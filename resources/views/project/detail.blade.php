@extends('layouts.app')
@section('title', 'プロジェクト詳細')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-2">
      <h2>プロジェクト詳細</h2>
      <b><big>プロジェクト名</big></b>
      <ul>
        <li>{{ $project->name }}</li>
      </ul>
      <b><big>顧客会社</big></b>
      <ul>
        <li>{{ $project->client->client_company->company_name }}</li>
      </ul>
      <b><big>契約日</big></b>
      <ul>
        <li>{{ $project->contract_date }}</li>
      </ul>
      <b><big>納期</big></b>
      <ul>
        <li>{{ $project->deadline_date }}</li>
      </ul>
      <b><big>担当者</big></b>
      <ul>
        @foreach($users as $user)
          <li>{{ $user->name }}</li>
        @endforeach
      </ul>
      <b><big>タスク進捗状況</big></b>
      <ul>
        @foreach($tasks as $task)
          <li>{{ $task->task_name }}：{{ $task->progress }} %</li>
        @endforeach
      </ul>
    </div>
  </div>
</div>
@endsection