@extends('layouts.app')
@section('title', '部署一覧')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-2">
      <h2>部署一覧</h2>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>部署名</th>
            <th>部長名</th>
          </tr>
        </thead>
        <tbody>
          @foreach($departments as $department)
            <tr>
              <td>{{ $department->department_name }}</th>
              <td>{{ $department->user->name }}</td>
              <td>
                <a href="{{ route('department.edit', $department) }}" class="btn btn-primary">編集</a>
                <a href="{{ route('department.delete', $department) }}" class="btn btn-primary">削除</a>
            </tr>
            @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection 