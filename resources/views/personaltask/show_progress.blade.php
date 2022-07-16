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
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($personal_tasks as $personal_task)
                        <tr>
                            <td>{{ $personal_task->personaltask_name }}</td>
                            @if($personal_task->progress == 100)
                                <td class="bg-primary text-white">{{ $personal_task->progress }}%  完了</td>
                            @else
                                <td class="bg-warning text-dark">{{ $personal_task->progress }}%  作業中</td>
                            @endif
                            <td>{{ $personal_task->deadline_date }}</td>
                            <td><a href="{{ route('personal_task.edit', $personal_task) }}" class="btn btn-primary">編集</a></td>
                            <td><a href="{{ route('personal_task.delete', $personal_task) }}" class="btn btn-primary">削除</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>    
</div>
@endsection