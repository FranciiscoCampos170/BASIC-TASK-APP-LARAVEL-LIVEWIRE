<?php

namespace App\Http\Livewire;

use App\Todo;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Todos extends Component
{
    use WithPagination;
    public $task;
    public $state = 0;

    public function updated($field)
    {
        $this->validateOnly($field, [
            'task' => 'max:15',
        ]);
    }
    public function finishTask($taskId)
    {
        $task = Todo::find($taskId);
        $task->state = 1;
        $task->save();
    }
    public function addTask()
    {
        $validatedData = $this->validate([
            'task' => 'required|min:6|max:15',
            'state' => 'required'
        ]);

        DB::transaction(function () use ($validatedData) {
            Todo::create($validatedData);
        });
        $this->task = "";
        session()->flash('message', 'Tarefa Adicionada!');
    }
    public function render()
    {
        return view('livewire.todos', [
            'tasks' => Todo::where('state', 0)->latest()->paginate(3)
        ]);
    }
}
