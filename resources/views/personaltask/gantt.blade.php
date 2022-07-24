@extends('layouts.app')
@section('title', 'タスク進行状況')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-2">
        　　<h2>タスク進行状況</h2>
            <svg id="gantt"></svg>
        </div>
    </div>    
</div>
@endsection

@section('script')
    <script>
        window.Laravel = {};
        window.Laravel.personalTasks = {!! $personal_tasks->toJson() !!};
    </script>
    <script src="{{ asset('js/gantt.js') }}" defer></script>
@endsection
