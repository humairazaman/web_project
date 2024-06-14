<?php

namespace App\Http\Controllers;


use App\Models\filings;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

use App\Models\project;

class ProjectController extends Controller
{
    //
    public function data()
    {
        return view('project.data');
    }

    public function display()
    {
        $project = Project::all();
        return view('project.display', compact('project'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'day' => 'required|string|max:255',
            'time' => 'required|string|max:255',
            'actor' => 'required|string|max:255',
            'file' => 'required|mimes:pdf,doc,docx,xls,csv,jpeg,png|max:4048',
        ]);

        $filename = time() . '.' . $request->file->extension();
        $request->file('file')->move(public_path('pro'), $filename);

        $project = new Project();
        $project->name = $request->input('name');
        $project->day = $request->input('day');
        $project->time = $request->input('time');
        $project->actor = $request->input('actor');
        $project->file = $filename;
        $project->save();

        return redirect('project/display')->with('status', 'Record created successfully');
    }

}
