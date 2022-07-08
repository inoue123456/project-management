@extends('layouts.app')
@section('title', '顧客担当者詳細')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h2>顧客担当者詳細</h2>
        <table class="table table-striped">
          <tbody>
            <tr>
              <th scope="row">担当者名</th>
              <td>{{ $client->client_name }}</td>
            </tr>
            <tr>
              <th scope="row">e-mail</th>
              <td>{{ $client->email }}</td>
            </tr>
            <tr>
              <th scope="row">電話番号</th>
              <td>{{ $client->phone_number }}</td>
            </tr>
          </tbody>
        </table>
    </div>
</div>
</div>
@endsection