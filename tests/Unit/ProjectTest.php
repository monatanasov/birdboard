<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
//use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use App\Models\Project;

class ProjectTest extends TestCase
{
    use RefreshDatabase;

//    /**
//     * A basic unit test example.
//     */
//    public function test_example(): void
//    {
//        $this->assertTrue(true);
//    }

    public function test_it_has_a_path()
    {
        $project = Project::factory()->create();

        $this->assertEquals('/projects/' . $project->id, $project->path());
    }

    public function test_it_belongs_to_an_owner()
    {
        $project = Project::factory()->create();

        $this->assertInstanceOf('App\Models\User', $project->owner);
    }

}
