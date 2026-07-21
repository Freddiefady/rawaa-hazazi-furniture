<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Contracts\View\View;

final class ServiceController extends Controller
{
    /**
     * Display services list.
     */
    public function index(): View
    {
        $services = Service::query()->latest()->get();

        return view('services', ['services' => $services]);
    }
}
