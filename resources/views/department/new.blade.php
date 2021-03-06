@extends('layouts.app')
@section('title', '部署登録')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <h2>部署登録</h2>
            <form action="{{ action('DepartmentController@create') }}" method="post" enctype="multipart/form-data">
                @if (count($errors) > 0)
                    <ul>
                        @foreach($errors->all() as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                @endif
                <div class="form-group row">
                    <label class="col-md-2">部署名</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="department_name" value="{{ old('department_name') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2">部長名</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="user_name" value="{{ old('user_name') }}">
                    </div>
                </div>
                {{ csrf_field() }}
                <input type="submit" class="btn btn-primary" value="更新">
            </form>
        </div>
    </div>
</div>
@endsection