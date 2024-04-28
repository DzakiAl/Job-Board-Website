<?php

namespace App\Http\Controllers;

use App\Models\JobBoard;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = JobBoard::query()
        ->orderBy('created_at', 'desc')
        ->get();    
        
        return view('home.index', ['jobs' => $jobs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort(403, 'Unauthorized action.');
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
    public function show(JobBoard $jobBoard)
    {
        return view('home.show', ['job' => $jobBoard]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JobBoard $jobBoard)
    {
        abort(403, 'Unauthorized action.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JobBoard $jobBoard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobBoard $jobBoard)
    {
        //
    }
}
