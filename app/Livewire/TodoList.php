<?php

namespace App\Livewire;

use App\Models\Todo;
use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TodoList extends Component
{
    use WithPagination;

    #[Rule("required|min:3|max:50")]
    public $name;

    public $search;

    public $todoID;

    #[Rule("required|min:3|max:50")]
    public $newName;

    public function create()
    {
        try {
            // Validate
            $validated = $this->validateOnly('name');
            // Create todo
            Todo::create($validated);
            // Clear input
            $this->reset('name');
            // Send flash message
            session()->flash('success', "Data Saved");
            // Reset pagination
            $this->resetPage();
        } catch (\Exception $e) {
            session()->flash('error', "Failed to create todo: " . $e->getMessage());
        }
    }

    public function toggle($id)
    {
        try {
            $todo = Todo::find($id);
            $todo->completed = !$todo->completed;
            $todo->save();
            session()->flash('success', "Todo updated successfully.");
        } catch (ModelNotFoundException $e) {
            session()->flash('error', "Todo not found.");
        } catch (\Exception $e) {
            session()->flash('error', "Failed to update todo: " . $e->getMessage());
        }
    }

    public function edit($id)
    {
        try {
            $todo = Todo::findOrFail($id);
            $this->todoID = $id;
            $this->newName = $todo->name;
        } catch (ModelNotFoundException $e) {
            session()->flash('error', "Todo not found.");
        } catch (\Exception $e) {
            session()->flash('error', "Failed to load todo: " . $e->getMessage());
        }
    }

    public function cancel()
    {
        $this->reset('todoID', 'newName');
    }

    public function update()
    {
        try {
            $this->validateOnly('newName');
            $todo = Todo::findOrFail($this->todoID);
            $todo->update(['name' => $this->newName]);
            session()->flash('updated', "Data Updated");
            $this->cancel();
        } catch (ModelNotFoundException $e) {
            session()->flash('error', "Todo not found.");
        } catch (\Exception $e) {
            session()->flash('error', "Failed to update todo: " . $e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $todo = Todo::findOrFail($id);
            $todo->delete();
            session()->flash('deleted', "Data Deleted");
        } catch (ModelNotFoundException $e) {
            session()->flash('error', "Todo not found.");
        } catch (\Exception $e) {
            session()->flash('error', "Failed to delete todo: " . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.todo-list', [
            'todos' => Todo::latest()->where('name', 'like', '%' . $this->search . '%')->paginate(5)
        ]);
    }
}
