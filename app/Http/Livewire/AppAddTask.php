<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use Livewire\Component;

class AppAddTask extends Component
{

    public $title;
    protected $rules = [
        'title' => 'required|unique:tasks,title|min:6',
    ];

    public function updated($title)
    {
        $this->validateOnly($title);
    }

    public function render()
    {
        return view('livewire.app-add-task');
    }

    public function addTask()
    {
        $this->validate();
        auth()->user()->tasks()->create([
            'title' => $this->title,
            'status' => false,
        ]);
        $this->title = '';
        $this->emit('taskAdded');       // event name
        session()->flash('message', 'Task has been added successfully');
    }

}
