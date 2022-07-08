@extends('layouts.app')
@section('title', 'タスク進行状況')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-2">
        　　<h2>タスク進行状況</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>タスク名</th>
                        <th>進行状況</th>
                        <th>終了予定日</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($personal_tasks as $personal_task)
                        <tr>
                            <td>{{ $personal_task->personaltask_name }}</td>
                            <td>
                                @if($personal_task->progress =='未着手'|| $personal_task->progress == '作業中')
                                    <span class="text-white bg-danger">{{ $personal_task->progress }}</span>
                                @else
                                    <span class="text-white bg-primary">{{ $personal_task->progress }}</span>
                                @endif
                            </td>
                            <td>{{ $personal_task->deadline_date }}</td>
                            <td><a href="{{ route('personal_task.edit', $personal_task) }}" class="btn btn-primary">編集</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>    
</div>
@endsection