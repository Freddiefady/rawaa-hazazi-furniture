<?php

declare(strict_types=1);

use App\Models\Project;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->seed(DatabaseSeeder::class);
});

test('portfolio page returns a successful response and list projects', function () {
    $response = $this->get(route('portfolio.index'));

    $response->assertSuccessful()
        ->assertSee('غرفة نوم ملكية كلاسيكية')
        ->assertSee('مجلس رجال مودرن بلمسات ذهبية');
});

test('portfolio details page returns a successful response for valid project', function () {
    $project = Project::first();

    $response = $this->get(route('portfolio.show', $project->id));

    $response->assertSuccessful()
        ->assertSee($project->title)
        ->assertSee('تفاصيل المشروع');
});
