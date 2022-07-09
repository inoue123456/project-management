@extends('layouts.app')
@section('title', 'パスワード変更')
@section('content')
    
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>パスワード変更</h2>
                <form action="{{ route('setting') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    @if (session('err_msg_currentpassword'))
                        <ul>
                            <li class="err_msg_currentpassword">{{ session('err_msg_currentpassword') }}</li>
                        </ul>
                    @endif
                    @if (session('err_msg_newpassword'))
                        <ul>
                            <li class="err_msg_newpassword">{{ session('err_msg_newpassword') }}</li>
                        </ul>
                    @endif
                    @if (session('err_msg_password_null'))
                        <ul>
                            <li class="err_msg_password_null">{{ session('err_msg_password_null') }}</li>
                        </ul>
                    @endif
                    @if (session('err_msg_not_confirmed'))
                        <ul>
                            <li class="err_msg_not_confirmed">{{ session('err_msg_not_confirmed') }}</li>
                        </ul>
                    @endif
                    @if (session('changed_done'))
                        <ul>
                            <li class="changed_done">{{ session('changed_done') }}</li>
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-4">現在のパスワード</label>
                        <div class="col-md-10">
                            <input type="password" class="form-control @error('currentpassword') is-invalid @enderror" name="current_password" autocomplete="new-password">
                        </div>
                    </div>
                    <div class="form-group row">    
                        <label class="col-md-4">新しいパスワード</label>
                        <div class="col-md-10">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="new_password" autocomplete="new-password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4">新しいパスワードの確認</label>
                        <div class="col-md-10">
                            <input type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection