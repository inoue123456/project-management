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
            @foreach ($personal_tasks as $personal_task)
                <tr>
                    <th scope="row">{{$personal_task->id}}</th>
                    <td>{{ $personal_task->personaltask_name }}</td>
                    <td>{{ $personal_task->deadline_date }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection