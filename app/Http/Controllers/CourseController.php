<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::active()->get(); 
        return view('latihan.pelatihan',
        ["courses" => $courses]);
    }

    public function myCourse(Request $request)
    {
        $courses = Auth::user()->courses;  
        return view('latihan.pelatihan',
        ["courses" => $courses]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(string $id)
    {
        $course = Course::findOrFail($id);
        return view('latihan.pelatihan_detail', ["course" => $course]);
    }
    public function join(string $id)
    {
        $course = Course::findOrFail($id);
        $course->users()->sync(Auth::user()->id);

        return redirect('/course/'.$id)
            ->with('success', 'Berhasil join pelatihan');
    }
    public function quit(string $id)
    {
        $course = Course::findOrFail($id);
        $course->users()->detach(Auth::user()->id);

        return redirect('/course/'.$id)
            ->with('success', 'Berhasil join pelatihan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
