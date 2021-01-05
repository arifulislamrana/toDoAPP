@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif

@if(count($tasks) <= 0)
    You don't have any task created yet!!
    Maybe, <a href="{{ route('task.create') }}">Create</a> one?
@else
    <div class="row">
        @foreach($tasks as $task)
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $task->name }}</h5>
                    <p class="card-text">{{ $task->description }}</p>
                    @if(getTaskStatus($task) !== "completed")
                        <form id="form-{{$task->id }}" method="post"
                                action="{{ route('task.complete', ['id' => $task->id]) }}">
                            @csrf()
                                <input type="checkbox" class="form-check"
                                    onchange="changeTaskStatus({{ $task->id }})"/>
                        </form>
                    @endif
                    <br>
                    <span class="badge badge-success">{{ getTaskStatus($task)  }}</span> 
                    <br/>

                    <span class="text-primary">
                        Ends at:<br>
                         {{ date('H:i a, d-m-Y', strtotime($task->end_time)) }}
                    </span>
                    <br>
                    <a href="{{ route('task.delete', ['id'=> $task->id]) }}" class="btn btn-danger">Delete</a>
                    <a href="{{ route('task.edit', ['id'=> $task->id]) }}" class="btn btn-info">Update</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <script>
        function changeTaskStatus(taskId) {
            const form = document.getElementById(`form-${taskId}`);
            form.submit();
        }
    </script>
@endif