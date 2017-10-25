<?php

namespace App\Http\Controllers;

use App\Problem;
use App\Hint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProblemController extends Controller
{
    public function index($problem)
    {
        $problemList = Problem::where('type', $problem)->with('hints')->get();

        return view('languages.index', compact('problemList') );
    }

    public function create()
    {
        if(Auth::user()->user_level == 10) {
            return view('forms.problemadd');
        }

        return redirect()->route('home')->with('status', 'warning')->with('message', 'You are not allowed to view that resource.');
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
