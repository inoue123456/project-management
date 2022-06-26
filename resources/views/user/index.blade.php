@extends('layouts.admin')
@section('content')
    
<div class="col-md-8 ml-auto">
    <form action="{{ route('user.index') }}" method="get">
        <table>
            <tr>
                <th><label>名前</label></th>
                <td><input type="text" class="form-control" name="search_name" value="{{ $search_name }}"></td>
                <th></th>
                <td>
                    @csrf
                    <input type="submit" class="btn btn-primary" value="検索">
                </td>
            </tr>
        </table>
    </form>
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
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection