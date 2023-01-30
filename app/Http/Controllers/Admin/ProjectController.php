<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        // $columns = Schema::getColumnListing('projects');
        return view('admin.projects.index', compact('projects'))->with('message', "Progetto creato con successo");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        $request->validate([
            'name' => 'required|string|max:150',
            'description' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048'
        ]);
        $data = $request->all();
        $new_project = new Project();
        $new_project->name = $data['name'];
        $new_project->description = $data['description'];
        $new_project->slug = Str::slug($new_project->name);

        if(isset($data['image'])) {
            $new_project->image = Storage::disk('public')->put('uploads', $data['image']);
        };

        $new_project->save();
        
        return redirect()->route('admin.projects.index')->with('message', "Il progetto $new_project->title è stato creato con successo.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(string $slug)
    {
        $project = Project::where('slug', $slug)->first();
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = $request->validated();
        $project->slug = Str::slug($data['name']);

        if(isset($data['image'])) {
            if ($project->image) {
                Storage::disk('public')->delete($project->image);
            }
            $data['image'] = Storage::disk('public')->put('uploads', $data['image']);
        };

        $project->update($data);
        return redirect()->route('admin.projects.show', compact('project'))->with('message', "Modifica effettuata");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('admin.projects.index');
    }
}
