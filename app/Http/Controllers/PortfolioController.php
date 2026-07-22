<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\getPortfolio;
use App\Models\Project;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

final class PortfolioController extends Controller
{
    /**
     * Display the categorized portfolio.
     */
    public function index(Request $request, getPortfolio $action): View
    {
        $result = $action->handle($request);

        return view('portfolio.index', [
            'projects' => $result['projects'],
            'categories' => $result['categories'],
            'activeCategory' => $result['activeCategory'],
        ]);
    }

    /**
     * Display details of a specific project.
     */
    public function show(Project $project): View
    {
        $project->load('images', 'category');

        return view('portfolio.show', ['project' => $project]);
    }
}
