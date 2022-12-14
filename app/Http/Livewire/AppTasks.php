<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class AppTasks extends Component
{
    use WithPagination;
    protected $listeners = ['taskAdded' => '$refresh'];
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $totalTasks = auth()->user()->tasks()->count();
        $tasks = auth()->user()->tasks()->latest()->paginate(5);
        return view('livewire.app-tasks', [
            'totalTasks' => $totalTasks,
            'tasks' => $tasks
        ]);
    }


}
