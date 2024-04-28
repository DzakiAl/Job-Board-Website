<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\JobBoard;
use Illuminate\Http\Request;

class JobBoardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = JobBoard::query()
            ->where('user_id', request()->user()->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('dashboard.index', ['jobs' => $jobs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'location' => ['required', 'string'],
            'company' => ['required', 'string'],
        ]);

        $data['user_id'] = $request->user()->id;
        $job = JobBoard::create($data);

        return redirect()->route('dashboard.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(JobBoard $jobBoard)
    {
        if ($jobBoard->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        return view('dashboard.show', ['job' => $jobBoard]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JobBoard $jobBoard)
    {
        if ($jobBoard->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        return view('dashboard.edit', ['job' => $jobBoard]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JobBoard $jobBoard)
    {
        $data = $request->validate([
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'location' => ['required', 'string'],
            'company' => ['required', 'string'],
        ]);
    
        $jobBoard->update($data);
    
        return redirect()->route('dashboard.index');
    }    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobBoard $jobBoard)
    {
        $jobBoard->delete();
        return redirect()->route('dashboard.index');
    }
}