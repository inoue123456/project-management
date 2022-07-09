@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>社員新規登録</h2>
                <form action="{{ route('user.create') }}" method="post" enctype="multipart/form-data" >

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    @if (session('err_msg_department'))
                        <ul>
                            <li class="err_msg_department">{{ session('err_msg_department') }}</li>
                        </ul>
                    @endif
                    @if (session('err_msg_role'))
                        <ul>
                            <li class="err_msg_role">{{ session('err_msg_role') }}</li>
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-4">社員名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4">e-mail</label>
                        <div class="col-md-10">
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}">
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
                    </div>
                    <div class="form-group row">
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
                    <input type="submit" class="btn btn-primary" value="登録">
                </form>
            </div>
        </div>
    </div>
@endsection