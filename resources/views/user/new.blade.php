@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>プロジェクト登録</h2>
                <form action="{{ action('Admin\UserController@create') }}" method="post" enctype="multipart/form-data" >

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-4">従業員名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="user_name" value="{{ old('user_name') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4">所属</label>
                            <div class="col-md-10">
                                <select class="form-control" name="department_id">
                                    <option value="---">---</option>
                                    @foreach($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4">e-mail</label>
                        <div class="col-md-10">
                            <input type="date" class="form-control" name="e-mail" value="{{ old('e-mail') }}">
                        </div>
                    </div>
                    
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="登録">
                </form>
            </div>
        </div>
    </div>
@endsection