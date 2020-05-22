<div>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <br>
            @if (session()->has('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
            @endif
            <form action="" wire:submit.prevent="addTask">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <div class="form-group">
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                placeholder="Sua próxima tarefa..." wire:model.debounce.500ms="task"></textarea>
                            @error('task')
                            <small id="" class="form-text  text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">OK</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-md-8">
            @foreach ($tasks as $task)
            <br>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <p class="card-text">{{ $task->task }} <span class="text-right" style="cursor: pointer" wire:click="finishTask({{ $task->id }})"><img src="https://img.icons8.com/fluent/48/000000/checked.png" width="30px"/></span></p>

                </div>
            </div>
            @endforeach
        </div>

        <div class="col-md-8">
            {{ $tasks->links('pagination-links') }}
        </div>
    </div>

</div>
