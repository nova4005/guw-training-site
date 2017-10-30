<?php

namespace App\Http\Controllers;

use Auth;
use App\Problem;
use App\User;
use App\Hint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProblemController extends Controller
{
    public function index($problem)
    {
        $problemList = Problem::where('type', $problem)->with('hints')->get();
        $user = Auth::user();
        $problemRelations = $user->problems()->get();

        return view('languages.index', compact('problemList', 'problemRelations') );
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
        $problem->points = $request->points;
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

    public function leaders()
    {
        $users = User::all();
        $leaders = [];
        foreach($users as $user) {
            $leaders[] = [
                'user' => $user,
                'points' => $user->problems->sum('points')
            ];
        }

        usort($leaders, 'sort_by_score' );

        return view('leaderboard', compact('leaders'));
    }
}
