@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1 class="text-center">Update Problem</h1>
                {!! Form::open(['method' => 'PATCH', 'action' => ['ProblemController@update',
                $question->id], 'class' =>'form-horizontal', 'id' => 'editProblem']) !!}
                <div class="form-group">
                    <label for="problem">Problem</label>
                    <input type="text" name="problem" class="form-control" value="{{ $question->question }}" required/>
                </div>
                <div class="form-group">
                    <label for="type">Type</label>
                    <type-component :types-list="{{ json_encode($question->type) }}"></type-component>
                </div>
                <div class="form-group">
                    <label for="points">Points</label>
                    <input type="number" name="points" class="form-control" required value="{{ $question->points }}"/>
                </div>
                <hint-component :hints-list="{{  $question->hints->toJson() }}"></hint-component>
                <div class="form-group">
                    {!! Form::submit('Add New Problem', ['class' => 'btn btn-primary btn-block']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
