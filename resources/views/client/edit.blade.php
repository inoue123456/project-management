@extends('layouts.app')
@section('title', '顧客情報の編集')
@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>顧客情報編集</h2>
                <form action="{{ route('client.update', $client) }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-4">依頼者名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="client_name" value="{{ $client->client_name }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4">依頼者メールアドレス</label>
                        <div class="col-md-10">
                            <input type="email" class="form-control" name="email" value="{{ $client->email }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4">依頼者電話番号</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="phone_number" placeholder="ハイフンなしで入力してください。"value="{{ $client->phone_number }}">
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
</div>
@endsection 