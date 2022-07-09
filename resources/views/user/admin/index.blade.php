@extends('layouts.admin')
@section('content')
    
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-2">
      <h2>職員一覧</h2>
    </div>
        <div class="row">
          <div class="col-md-8">
            <form action="{{ route('user.index') }}" method="get">
              <div class="form-group row">
                <label class="col-md-8">名前</label>
              <div class="col-md-10">
                <input type="text" class="form-control" name="search_name" value="{{ $search_name }}">
              </div>
              <div class="col-md-2">
                {{ csrf_field() }}
               <input type="submit" class="btn btn-primary" value="検索">
              </div>
              </div>
            </form>
          </div>
        </div>
        <div class="container">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>created_at</th>
                        <th>updated_at</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <th scope="row">{{$user->id}}</th>
                            <td><a href="{{ route('user.showDetail', $user)}}">{{$user->name}}</a></td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->created_at}}</td>
                            <td>{{$user->updated_at}}</td>
                            <td><a href="{{ route('user.edit', $user) }}" class="btn btn-primary">編集</a></td>
                            <td><a href="{{ route('user.delete', $user) }}" class="btn btn-primary">削除</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection