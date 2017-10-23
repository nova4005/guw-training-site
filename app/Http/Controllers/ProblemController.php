<?php

namespace App\Http\Controllers;

use App\Problem;
use App\Hint;
use Illuminate\Http\Request;

class ProblemController extends Controller
{
    public function create()
    {
        return view('forms.problemadd');
    }

    public function store(Request $request)
    {
        $problem = new Problem;

        $problem->question = $request->problem;
        $problem->type = $request->type;
        $problem->save();

        foreach($request->hint as $hint) {
            $newHint = new Hint;
            $newHint->problem_id = $problem->id;
            $newHint->hint = $hint;
            $newHint->save();
        }

        if($problem) {
            return back()->with('status', 'success')->with('message', 'Problem Created!');
        }

        return back()->with('status', 'warning')->with('message', 'Something went wrong adding the problem.');
    }
}
