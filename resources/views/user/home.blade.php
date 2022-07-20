@extends('layouts.app')
@section('title', 'ホーム')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h5><a href="{{ route('personal_task.showProgress') }}">私の進行状況</a></h5>
        <h5>お知らせ</h5>
        <ul>★新規業務依頼
          @foreach($projects as $project)
            @if($project->created_at <= date('Y-m-d H:i:s', time()-(3*24*60*60)))
              <ul><a href={{ route('task.showProgress', $project)}}>{{ $project->name }}</a> 、納期{{ $project->deadline_date }}</ul>
            @endif
          @endforeach
        </ul>
        <h5>担当プロジェクト</h5>
        @foreach($projects as $project)
          <ul><a href={{ route('task.showProgress', $project)}}>{{ $project->name }}</a></ul>
        @endforeach
        @auth
          @if (auth()->user()->role >= 5)
            <h5><a href="{{ route('project.index') }}">プロジェクト一覧</a></h5>
          @endif
        @endauth
    </div>
  </div>
</div>
@endsection 