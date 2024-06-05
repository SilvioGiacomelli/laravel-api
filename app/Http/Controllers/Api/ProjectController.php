<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\Technology;
use App\Models\Type;
use App\Models\ProjectTechnology;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return response()->json($projects);
    }

    public function getTechnologies()
    {
        $technologies = Technology::all();
        return response()->json($technologies);
    }
    public function getTypes()
    {
        $types = Type::all();
        return response()->json($types);
    }
    public function getProjectBySlug($slug)
    {
        $project = Project::where('slug', $slug)->with('type', 'technologies')->first();
        if ($project) {
            $success = true;
            if ($project->image) {
                $project->image = asset('storage/uploads/' . $project->image);
            } else {
                $project->image = asset('storage/uploads/noimg.jpg');
            }
        } else {
            $success = false;
        }
        return response()->json(compact('success', 'project'));
    }
}
