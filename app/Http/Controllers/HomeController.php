<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Service;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    /**
     * Display the landing page.
     */
    public function index(): View
    {
        $latestProjects = Project::query()
            ->latest()
            ->take(3)
            ->get();
        $services = Service::query()->get();

        return view('home', compact('latestProjects', 'services'));
    }

    /**
     * Display the interactive material customizer visualizer.
     */
    public function visualizer(): View
    {
        return view('visualizer');
    }
}
