@extends('layouts.app')
@section('title', 'タスク登録')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>タスク登録</h2>
                <form action="{{ route('personal_task.create') }}" method="post" enctype="multipart/form-data">

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
                        <label class="col-md-3">プロジェクト</label>
                            <div class="col-md-10">
                                <select class="form-control" name="project_id">
                                    <option value="---">---</option>
                                    @foreach($projects as $project)
                                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-3">タスク名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="task_name" value="{{ old('task_name') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">進行状況</label>
                            <div class="col-md-10">
                                <select class="form-control" name="progress">
                                    <option value="未着手">未着手</option>
                                    <option value="作業中">作業中</option>
                                    <option value="完了">完了</option>
                                </select>
                            </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">納期</label>
                        <div class="col-md-10">
                            <input type="date" class="form-control" name="deadline_date" value="{{ old('deadline_date') }}">
                        </div>
                    </div>
                    
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="登録">
                </form>
            </div>
        </div>
    </div>
@endsection