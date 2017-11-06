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
}
