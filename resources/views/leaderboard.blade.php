@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="jumbotron"><h1 class="text-center">Leaderboard</h1></div>
                <table class="table table-striped table-hover table-responsive">
                    <thead class="thead-inverse">
                        <tr>
                            <th>Rank</th>
                            <th>Name</th>
                            <th>Score</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($leaders as $key => $leader)
                            <tr class="{{ ($loop->first) ? 'success' : '' }}" >
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $leader['user']->name }}</td>
                                <td>{{ $leader['points'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
