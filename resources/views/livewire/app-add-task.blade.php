<div>
    <h3 class="text-center">Add New Task</h3>
    @if(session()->has('message'))
        <div class="div alert alert-success">
            {{session('message')}}
        </div>
    @endif

    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" wire:model="title" class="form-control">
        @error('title') <span class="text-danger">{{ $message }}</span> @enderror

    </div>

    <div class="form-group">
        <button wire:click.prevent="addTask" class="btn btn-primary btn-block" onclick="submitForm(this)">Add</button>
    </div>

</div>
