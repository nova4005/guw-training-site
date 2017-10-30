<?php

namespace App\Http\Controllers;

use Auth;
use App\UserProblem;
use Illuminate\Http\Request;

/**
 * Class UserProblemController
 * @package App\Http\Controllers
 */
class UserProblemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $problemChange = $user->problems()->toggle($request->pid);

        if (!empty($problemChange['attached'])) {
            return json_encode(['status' => true]);
        }

        return json_encode(['status' => false]);
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function problem_status(Request $request)
    {
        $user = Auth::user();

        $exists = $user->problems()->where('problem_id', $request->pid)->exists();

        if($exists) {
            return json_encode(['status' => true]);
        }

        return json_encode(['status' => false]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserProblem $point
     * @return \Illuminate\Http\Response
     */
    public function edit(UserProblem $point)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\UserProblem $point
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserProblem $point)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserProblem $point
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserProblem $point)
    {
        //
    }
}
