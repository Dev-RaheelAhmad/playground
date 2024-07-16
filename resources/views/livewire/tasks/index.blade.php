<?php

use Livewire\Volt\Component;
use App\Models\Task;

new class extends Component {
    public $tasks, $title, $description, $taskId;
    public $is_completed = false;

    public function mount(): void
    {
        $this->tasks = Task::all();
    }

    public function resetFields()
    {
        $this->reset(['title', 'description', 'is_completed']);
    }

    public function store()
    {
        $this->validate([
            'title' => 'required',
            'description' => 'nullable',
        ]);

        Task::updateOrCreate(
            ['id' => $this->taskId],
            [
                'title' => $this->title,
                'description' => $this->description,
                'is_completed' => $this->is_completed,
            ],
        );

        session()->flash('message', $this->taskId ? 'Task updated successfully.' : 'Task created successfully.');

        $this->resetFields();
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);
        $this->taskId = $id;
        $this->title = $task->title;
        $this->description = $task->description;
        $this->is_completed = $task->is_completed;
    }

    public function delete($id)
    {
        Task::find($id)->delete();

        session()->flash('message', 'Task deleted successfully.');
    }
}; ?>

<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="store">
        <input type="hidden" wire:model="taskId">
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" wire:model="title">
            @error('title')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" wire:model="description"></textarea>
            @error('description')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>

    <table class="table mt-5 table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Completed</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($this->tasks as $task)
                <tr :key="task.id">
                    <td>{{ $task->id }}</td>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->description }}</td>
                    <td>{{ $task->is_completed ? 'Yes' : 'No' }}</td>
                    <td>
                        <button wire:click="edit({{ $task->id }})" class="btn btn-primary btn-sm">Edit</button>
                        <button wire:click="delete({{ $task->id }})" class="btn btn-danger btn-sm">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
