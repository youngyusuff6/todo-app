<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Todo;
use Livewire\Livewire;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TodoListTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_todo()
    {
        Livewire::test('todo-list')
            ->set('name', 'New Todo')
            ->call('create')
            ->assertSee('Data Saved');

        $this->assertTrue(Todo::where('name', 'New Todo')->exists());
    }

    //     /** @test */
    // public function it_can_toggle_a_todo()
    // {
    //     $todo = Todo::create(['name' => 'Test Todo', 'completed' => false]);

    //     Livewire::test('todo-list')
    //         ->call('toggle', $todo->id)
    //         ->assertSee('Completed');

    //     $this->assertTrue($todo->fresh()->completed);
    // }


    /** @test */
    public function it_can_update_a_todo()
    {
        $todo = Todo::create(['name' => 'Old Name']);

        Livewire::test('todo-list')
            ->call('edit', $todo->id)
            ->set('newName', 'Updated Name')
            ->call('update')
            ->assertSee('Data Updated');

        $this->assertEquals('Updated Name', $todo->fresh()->name);
    }

    /** @test */
    public function it_can_delete_a_todo()
    {
        $todo = Todo::create(['name' => 'Delete Me']);

        Livewire::test('todo-list')
            ->call('delete', $todo->id)
            ->assertSee('Data Deleted');

        $this->assertFalse(Todo::where('name', 'Delete Me')->exists());
    }
}
