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
                    <div class="form-group row">
                        <label class="col-md-4">現在のパスワード</label>
                        <div class="col-md-10">
                            <input type="password" class="form-control @error('currentpassword') is-invalid @enderror" name="current_password" value="{{ old('current_password') }}">
                        </div>
                    </div>
                    <div class="form-group row">    
                        <label class="col-md-4">新しいパスワード</label>
                        <div class="col-md-10">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4">新しいパスワードの確認</label>
                        <div class="col-md-10">
                            <input type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}">
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection