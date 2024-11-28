<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //get user login id
        $id = Auth::id();

        // get user login
        $user = $request->user();
        // $user2 = Auth::user();
        return response()->json(['user' => $user, "id" => $id]);
        // return view('greeting',['user' => $user, "id" => $id]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return "create photo";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
    {
        $user_id = $request->query('user_id');
        $isAllow = Gate::allows('update-post', [$user_id]);
        Log::info($isAllow);

        echo "Gate Allows :".$isAllow;

        Gate::authorize('update-post', [$user_id]);

        return "show photo ".$id;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return "edit photo ".$id;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
