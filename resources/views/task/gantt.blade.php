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
    <div class="mx-auto mt-3 btn-group" role="group">
	    <button type="button" class="btn btn-sm btn-light">Day</button>
	    <button type="button" class="btn btn-sm btn-light active">Week</button>
	    <button type="button" class="btn btn-sm btn-light">Month</button>
	</div>
</div>
@endsection

@section('script')
    <script>
        window.Laravel = {};
        window.Laravel.tasks = {!! $tasks->toJson() !!};
    </script>
    <script src="{{ asset('js/tasks_gantt.js') }}"defer></script>
@endsection
