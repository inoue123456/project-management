@extends('layouts.app')
@section('title', 'プロジェクト進行状況')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-2">
        　　<h2>プロジェクト進行状況</h2>
            <h4>プロジェクト：{{ $project->name }}</h4>
            <h4><a href="{{ route('client.showDetail', $client) }}">顧客担当者：{{ $client->client_name }}</a></h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>プロジェクトのタスク名</td>
                        <th>進行状況</td>
                        <th>納期</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                    <tr>
                        <td><a href="{{ route('personal_task.showProgress')}}">{{ $task->task_name }}</a></td>
                        @if($task->progress == 100)
                            <td class="bg-primary text-white">{{ $task->progress }}%  完了</td>
                        @else
                            @if($task->progress == 0)
                                <td class="bg-danger text-white">{{ $task->progress }}%  未着手</td>
                            @else
                                <td class="bg-warning text-dark">{{ $task->progress }}%  作業中</td>
                            @endif
                        @endif
                        <td>{{ $task->deadline_date }}</td>
                        <td><a href="{{ route('task.edit', $task) }}" class="btn btn-primary">編集</a></td>
                        <td><a href="{{ route('task.delete', $task) }}" class="btn btn-primary">削除</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>    
</div>
@endsection