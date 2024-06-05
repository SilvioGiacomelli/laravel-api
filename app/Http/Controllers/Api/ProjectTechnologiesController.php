<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectTechnologiesController extends Controller
{
    public function index(Project $project)
    {
        return response()->json($project->load('technologies'));
    }
}
