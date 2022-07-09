@extends('layouts.app')
@section('title', '職員情報の編集')
@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>職員情報編集</h2>
                <form action="{{ route('user.update', $user) }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    @if (session('err_msg_department'))
                        <ul>
                            <li class="err_msg">{{ session('err_msg_department') }}</li>
                        </ul>
                    @endif
                    @if (session('err_msg_role'))
                        <ul>
                            <li class="err_msg">{{ session('err_msg_role') }}</li>
                        </ul>
                    @endif
                    @if (session('updated_done'))
                        <div class="updated_done">
                            {{ session('updated_done') }}
                        </div>
                    @endif
                    
                    <div class="form-group row">
                        <label class="col-md-4">名前</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4">e-mail</label>
                        <div class="col-md-10">
                            <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4">所属</label>
                        <div class="col-md-10">
                            <select class="form-control" name="department_id">
                                <option value="---">---</option>
                                @foreach($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <label class="col-md-4">権限</label>
                        <div class="col-md-10">
                            <select class="form-control" name="role">
                                <option value="---">---</option>
                                <option value="一般社員">一般社員</option>
                                <option value="部長">部長</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
</div>
@endsection 