@extends('layouts.app')

@section('content')
    <div class="container">
{{--        {{ dd($problemRelations) }}--}}
        @forelse($problemList as $index => $problem)
            @if( ( ($index + 1) % 2) == 0)
                <div class="container">
                    <div class="row">
            @endif
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading language-wrapper">{{ $problem->type }}
                            <span class="align-right">Available Points: {{ $problem->points }} &nbsp;
                                @foreach($problemRelations as $relation)
                                    @if($relation->pivot->problem_id == $problem->id)
                                        <?php $checked = 'checked'; ?>
                                        @break
                                    @else
                                        <?php $checked = ''; ?>
                                    @endif
                                @endforeach
                                <input type="checkbox" @click="toggleProblemCompletion($event)" name="{{ $problem->question }}" {{ $checked }} value="{{ $problem->id }}" >
                            </span></div>
                        <div class="panel-body">
                            <h4><strong>Question:</strong> {{ $problem->question }}</h4>
                            <hr>
                            <button class="btn btn-primary btn-xs" type="button" data-toggle="collapse" data-target="#collapse-{{ $problem->id }}" aria-expanded="false" aria-controls="collapseExample">Show Hint</button>
                            <div class="collapse" id="collapse-{{ $problem->id }}">
                                <h4><strong>Hint:</strong></h4>
                                @foreach($problem->hints as $hint)
                                    <div class="card card-block">
                                       <code>{{ $hint->hint }}</code>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @if( ( ($index + 1) % 2) == 0)
                    </div>
                </div>
            @endif
        @empty
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-heading">Problems</div>
                            <div class="panel-body">
                                <p>No results were found.</p>
                            </div>
                        </div>
                    </div>
            </div>
        @endforelse
    </div>
@endsection
