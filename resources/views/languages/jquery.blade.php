@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">jQuery</div>
                    <div class="panel-body">
                        <h4><strong>Question:</strong> build a mortgage calculator</h4>
                        <hr>
                        <button class="btn btn-primary btn-xs" type="button" data-toggle="collapse"
                                data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            Show Hint
                        </button>
                        <div class="collapse" id="collapseExample">
                            <h4><strong>Hint:</strong></h4>
                            <div class="card card-block">
                               <code>
                                   &lt;?php
                                    $var = 100;
                                   ?&gt;
                               </code>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">jQuery</div>
                    <div class="panel-body">
                        <h4>Just jotting down ideas for now</h4>
                        <ul>
                            <li>build a mortgage calculator</li>
                            <li>build a slide out menu</li>
                            <li>
                                <blockquote>
                                    <p>Build ajax pagination for WP blog roll</p>
                                    <small>Garrett</small>
                                </blockquote>
                            </li>
                            <li><code>&lt;section&gt;</code></li>
                            <li><var>y</var> = <var>m</var><var>x</var> + <var>b</var></li>
                            <li>
                                <pre>&lt;p&gt;Sample text here...&lt;/p&gt;</pre>
                            </li>
                            <li><samp>This text is meant to be treated as sample output from a computer program.</samp>
                            </li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
