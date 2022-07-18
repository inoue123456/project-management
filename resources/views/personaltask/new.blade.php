@extends('layouts.app')
@section('title', '担当者タスク登録')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <h2>担当者タスク登録</h2>
            <form action="{{ action('PersonalTaskController@create') }}" method="post" enctype="multipart/form-data">
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
                    <label class="col-md-3">タスク</label>
                        @if($tasks == 'null')
                            <div class="col-md-10">
                                <select class="form-control" name="task_id">
                                    <option value="---">---</option>
                                </select>
                            </div>
                        @else
                            <div class="col-md-10">
                                <select class="form-control" name="task_id">
                                    <option value="---">---</option>
                                    @foreach($tasks as $task)
                                        @foreach($task as $task_select)
                                            <option value="{{ $task_select->id }}">{{ $task_select->task_name }}</option>
                                        @endforeach
                                    @endforeach
                                </select>
                            </div>
                        @endif
                </div>
                <div class="form-group row">
                    <label class="col-md-3">担当者タスク名</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="personaltask_name" value="{{ old('personaltask_name') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3">進行状況</label>
                        <div class="col-md-10">
                            <input type="number" class="form-control" name="progress" min="0" max="100">
                        </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3">終了予定日</label>
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