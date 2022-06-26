@extends('layouts.app')

@section('content')
<div class="col-md-8 ml-auto">
    <form action="{{ route('client_company.index') }}" method="get">
        <table>
            <tr>
                <th><label>会社名</label></th>
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
                <th>会社名</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($client_companies as $client_company)
                <tr>
                    <th scope="row">{{$client_company->id}}</th>
                    <td>{{$client_company->company_name}}</a></td>
                    <td>
                        <a href="{{ route('client_company.edit', $client_company) }}" class="btn btn-primary">編集</a>
                        <a href="{{ route('client_company.delete', $client_company) }}" class="btn btn-primary">削除</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection