<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:200|min:3',
            'image'=> 'url|nullable|max:255',
            'content'=>'required|'
        ]);
        $form_data = $request->all();
        $form_data['slug'] = Project::generateSlug($form_data['title']);
        if(Project::where('slug',$form_data['slug'])){
            $form_data['title'] = Project::generateTitleUnique($form_data['title']);
            $form_data['slug'] = Project::generateSlug($form_data['title']);
        }
        $newProject = Project::create($form_data);
        return redirect()->route('admin.projects.show', $newProject->slug)->with('message', $form_data['title'] . ' è stato creato');

    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {   
        $request->validate([
            'title' => 'required|max:200|min:3',
            'image'=> 'url|nullable|max:255',
            'content'=>'required|'
        ]);
        $form_data = $request->all();
        if ($project->title !== $form_data['title']) {
            $form_data['slug'] = Project::generateSlug($form_data['title']);
        }
        $project->update($form_data);
        return redirect()->route('admin.projects.show', compact('project'))->with('message', $project->title . ' è stato editato');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('message', $project->title . ' è stato eliminato');
    }
}
