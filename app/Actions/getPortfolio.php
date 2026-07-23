<?php

declare(strict_types=1);

namespace App\Actions;

use App\Models\Category;
use App\Models\Project;
use Illuminate\Http\Request;

final class getPortfolio
{
    /**
     * @return array<string, mixed>
     */
    public function handle(Request $request): array
    {
        $activeCategories = $request->query('category');

        if ($activeCategories === 'الكل' || empty($activeCategories)) {
            $activeCategories = null;
        }

        // Only show active categories in the public filter bar
        $categories = Category::query()->orderBy('name', direction: 'desc')->get();

        $query = Project::query()->with('category');

        if ($activeCategories) {
            $query->whereHas('category', fn ($query) => $query->where('name', $activeCategories));
        }

        $projects = $query->latest()->get();

        return [
            'projects' => $projects,
            'categories' => $categories,
            'activeCategory' => $activeCategories,
        ];
    }
}
