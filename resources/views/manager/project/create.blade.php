@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>プロジェクト登録</h2>
                <form action="{{ action('Admin\ProjectController@create') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2">プロジェクト名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="projectname" value="{{ old('projectname') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">契約日</label>
                        <div class="col-md-10">
                            <input type="date" class="form-control" name="contractday" value="{{ old('contractday') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">納期</label>
                        <div class="col-md-10">
                            <input type="date" class="form-control" name="deadline" value="{{ old('deadline') }}">
                        </div>
                    </div>
                    
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection