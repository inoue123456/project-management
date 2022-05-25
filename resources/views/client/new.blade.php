@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>依頼者登録</h2>
                <form action="{{ action('Admin\ClientController@create') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    @if (session('err_msg'))
                        <ul>
                            <li class="err_msg">{{ session('err_msg') }}</li>
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-3">会社名</label>
                            <div class="col-md-10">
                                <select class="form-control" name="client_company_id">
                                    <option value="---">---</option>
                                    @foreach($client_companies as $client_company)
                                    <option value="{{ $client_company->id }}">{{ $client_company->company_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-3">依頼者名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="client_name" value="{{ old('client_name') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">メールアドレス</label>
                        <div class="col-md-10">
                            <input type="email" class="form-control" name="e-mail" value="{{ old('e-mail') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">電話番号</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="phone_number" placeholder="ハイフンなしで入力してくれ"value="{{ old('phone_number') }}">
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="登録">
                </form>
            </div>
        </div>
    </div>
@endsection