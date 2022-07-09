@extends('layouts.admin')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h2>職員詳細</h2>
        <table class="table table-striped">
          <tbody>
            <tr>
              <th scope="row">職員名</th>
              <td>{{ $user->name }}</td>
            </tr>
            <tr>
              <th scope="row">e-mail</th>
              <td>{{ $user->email }}</td>
            </tr>
            <tr>
              <th scope="row">権限</th>
              <td>{{ $user->role }}</td>
            </tr>
          </tbody>
        </table>
    </div>
</div>
</div>
@endsection