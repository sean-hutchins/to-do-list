<?php
namespace Tests\Unit;

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;



class TaskTest extends TestCase
{
    use RefreshDatabase;



    public function testCreateTask() : void
    {
        $data = [
            'name' => 'Test task.',
        ];

        $response = $this->put('/task', $data);
        $response->assertStatus(302);

        // $this->assertCount(1, Task::all());
        $task = Task::find($data);

        $this->assertNotNull($task);
        $this->assertDatabaseHas('tasks', $data);
    }

    public function testDestroyTask() : void
    {
        $task = Task::factory()->create(['name' => 'Test task.']);

        $response = $this->delete("/task/{$task->id}");

        $response->assertStatus(302);

        $this->assertCount(0, Task::all());
    }
}
