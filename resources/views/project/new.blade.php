@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>プロジェクト登録</h2>
                <form action="{{ action('Admin\ProjectController@create') }}" method="post" enctype="multipart/form-data" >

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-4">プロジェクト名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4">契約日</label>
                        <div class="col-md-10">
                            <input type="date" class="form-control" name="contract_date" value="{{ old('contract_date') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4">納期</label>
                        <div class="col-md-10">
                            <input type="date" class="form-control" name="deadline_date" value="{{ old('deadline_date') }}">
                        </div>
                    </div>
                    <br>
                    <big><p>顧客情報</p></big>
                    <div class="form-group row">
                        <label class="col-md-4">会社名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="company_name" value="{{ old('company_name') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4">依頼者名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="client_name" value="{{ old('client_name') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4">依頼者メールアドレス</label>
                        <div class="col-md-10">
                            <input type="email" class="form-control" name="e-mail" value="{{ old('e-mail') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4">依頼者電話番号</label>
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