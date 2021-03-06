@extends('layouts.app')
@section('title', '顧客会社情報編集')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <h2>顧客会社情報編集</h2>
            <form action="{{ route('client_company.update', $client_company) }}" method="post" enctype="multipart/form-data">
                @if (count($errors) > 0)
                    <ul>
                        @foreach($errors->all() as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                @endif
                <div class="form-group row">
                    <label class="col-md-4">会社名</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="client_name" value="{{ $client_company->company_name }}">
                    </div>
                </div>
                {{ csrf_field() }}
                <input type="submit" class="btn btn-primary" value="更新">
            </form>
        </div>
    </div>
</div>
@endsection 