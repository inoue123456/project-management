@extends('layouts.app')
@section('content')

<div class="container">
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>タスク名</th>
                <th>終了予定日</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
                <tr>
                    <th scope="row">{{$task->id}}</th>
                    <td>{{ $task->task_name }}</td>
                    <td>{{ $task->deadline_date }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection