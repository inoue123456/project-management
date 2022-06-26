@extends('layouts.app')

@section('content')
<div class="col-md-8 ml-auto">
    <form action="{{ route('client.index') }}" method="get">
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
                <th>依頼者名</th>
                <th>Email</th>
                <th>電話番号</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clients as $client)
                <tr>
                    <th scope="row">{{$client->id}}</th>
                    <td>{{$client->client_name}}</a></td>
                    <td>{{$client->email}}</td>
                    <td>{{$client->phone_number}}</td>
                    <td><a href="{{ route('client.edit', $client) }}" class="btn btn-primary">編集</a></td>
                    <td><a href="{{ route('client.delete', $client) }}" class="btn btn-primary">削除</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection