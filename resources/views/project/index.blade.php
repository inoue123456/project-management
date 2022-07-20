@extends('layouts.app')
@section('title', 'プロジェクト一覧')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-2">
      <h2>プロジェクト一覧</h2>
    </div>
    <div class="row">
      <div class="col-md-8">
        <form action="{{ route('project.index') }}" method="get">
          <div class="form-group row">
            <label class="col-md-8">プロジェクト名</label>
            <div class="col-md-8">
              <input type="text" class="form-control" name="search_project_name" value="{{ $search_project_name }}">
            </div>
            <div class="col-md-2">
              {{ csrf_field() }}
              <input type="submit" class="btn btn-primary" value="検索">
            </div>
          </div>
        </form>
      </div>
    </div>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>プロジェクト名</th>
          <th>契約日</th>
          <th>納期</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
      @foreach($projects as $project)
        <tr>
          <td><a href="{{ route('project.showDetail', $project) }}">{{ $project->name }}</a></th>
          <td>{{ $project->contract_date }}</td>
          <td>{{ $project->deadline_date }}</td>
          <td><a href="{{ route('project.edit', $project) }}" class="btn btn-primary">編集</a></td>
          <td><a href="{{ route('project.delete', $project) }}" class="btn btn-primary">削除</a></td>
        </tr>
      @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection 