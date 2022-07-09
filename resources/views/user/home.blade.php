@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h5><a href="{{ route('personal_task.showProgress') }}">私の進行状況</a></h5>
        <h5>お知らせ</h5>
        <ul>★</ul>
        <h5>担当プロジェクト</h5>
        @foreach($projects as $project)
        <ul><a href={{ route('task.showProgress', $project)}}>{{ $project->name }}</a></ul>
        @endforeach
    </div>
  </div>
</div>
@endsection 