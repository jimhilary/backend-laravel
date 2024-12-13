<?php
namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_tasks()
    {
        Task::factory()->count(5)->create();
        $response = $this->getJson('/api/tasks');
        $response->assertStatus(200)->assertJsonCount(5, 'data');
    }

    public function test_can_create_task()
    {
        $response = $this->postJson('/api/tasks', [
            'title' => 'Sample Task',
            'status' => 'pending',
        ]);

        $response->assertStatus(201)->assertJson(['title' => 'Sample Task']);
    }

    public function test_can_update_task()
    {
        $task = Task::factory()->create();
        $response = $this->putJson("/api/tasks/{$task->id}", [
            'title' => 'Updated Task',
        ]);

        $response->assertStatus(200)->assertJson(['title' => 'Updated Task']);
    }

    public function test_can_delete_task()
    {
        $task = Task::factory()->create();
        $response = $this->deleteJson("/api/tasks/{$task->id}");

        $response->assertStatus(204);
    }
}
