@extends('layouts.app')
@section('title', 'プロジェクト編集')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <h2>プロジェクト編集</h2>
            <form action="{{ route('project.update') }}" method="post" enctype="multipart/form-data">
                @if (count($errors) > 0)
                    <ul>
                        @foreach($errors->all() as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                @endif
                <input type="hidden" name='id' value="{{ $project->id }}">
                <div class="form-group row">
                    <label class="col-md-4">プロジェクト名</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="name" value="{{ $project->name }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-4">契約日</label>
                    <div class="col-md-10">
                        <input type="date" class="form-control" name="contract_date" value="{{ $project->contract_date }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-4">納期</label>
                    <div class="col-md-10">
                        <input type="date" class="form-control" name="deadline_date" value="{{ $project->deadline_date }}">
                    </div>
                </div>
                <p>担当者</p>
                <div class="form-group row">
                    <div class="col-md-10">
                        <select class="form-control" name="user_ids[]">
                            <option value="---">---</option>
                            @foreach($users_in_department as $user_in_department)
                                <option value="{{ $user_in_department->id }}">{{ $user_in_department->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-2 col-md-10">
                        <select class="form-control" name="user_ids[]">
                            <option value="---">---</option>
                            @foreach($users_in_department as $user_in_department)
                                <option value="{{ $user_in_department->id }}">{{ $user_in_department->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                {{ csrf_field() }}
                <input type="submit" class="btn btn-primary" value="更新">
            </form>
        </div>
    </div>
</div>
@endsection