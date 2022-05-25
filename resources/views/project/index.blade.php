@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h2>プロジェクト一覧</h2>
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
              <td>{{ $project->name }}</th>
              <td>{{ $project->contract_date }}</td>
              <td>{{ $project->deadline_date }}</td>
              <td><a href="{{ action('Admin\ProjectController@edit', $project) }}" class="btn btn-primary">編集</a></td>
              <td><a href="{{ action('Admin\ProjectController@delete', $project) }}" class="btn btn-primary">削除</a></td>
              
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
  </div>
</div>
@endsection 