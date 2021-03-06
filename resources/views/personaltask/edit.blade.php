@extends('layouts.app')
@section('title', '担当者タスク編集')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <h2>担当者タスク編集</h2>
            <form action="{{ route('personal_task.update', $personal_task) }}" method="post" enctype="multipart/form-data">
                @if (count($errors) > 0)
                    <ul>
                        @foreach($errors->all() as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                @endif
                <input type="hidden" name='id' value="{{ $personal_task->id }}">
                <div class="form-group row">
                    <label class="col-md-3">タスク</label>
                        <div class="col-md-10">
                            <select class="form-control" name="task_id">
                                <option value="{{ $personal_task->task->id }}">{{ $personal_task->task->task_name }}</option>
                                @foreach($tasks as $task)
                                    <option value="{{ $task->id }}">{{ $task->task_name }}</option>
                                @endforeach
                            </select>
                        </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3">担当者タスク名</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="personaltask_name" value="{{ $personal_task->personaltask_name }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3">進行状況</label>
                        <div class="col-md-10">
                            <input type="number" class="form-control" name="progress" min="0" max="100" value="{{ $personal_task->progress }}">
                        </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3">終了予定日</label>
                    <div class="col-md-10">
                        <input type="date" class="form-control" name="deadline_date" value="{{ $personal_task->deadline_date }}">
                    </div>
                </div>
                {{ csrf_field() }}
                <input type="submit" class="btn btn-primary" value="更新">
            </form>
        </div>
    </div>
</div>
@endsection