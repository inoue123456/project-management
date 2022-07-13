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
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                    <tr>
                        <td><a href="{{ route('personal_task.showProgress')}}">{{ $task->task_name }}</a></td>
                        <td>
                            @if($personal_task->progress == 100)
                                <span class="text-white bg-primary">完了</span>
                            @else
                                <span class="text-white .bg-warning">{{ $personal_task->progress }}%</span>
                            @endif
                        </td>
                        <td>{{ $task->deadline_date }}</td>
                        <td><a href="{{ route('task.edit', $task) }}" class="btn btn-primary">編集</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>    
</div>
@endsection