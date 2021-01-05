@if (isset($task))
<form method="POST" action="{{ route('task.update', ['id' => $task->id]) }}">
@else
<form method="POST" action="{{ route('task.save') }}">  
@endif


    @csrf

    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

        <div class="col-md-6">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" 
            value="@if(isset($task)){{$task->name}}@else{{old('name')}}@endif" autocomplete="name" autofocus>

            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="description"
               class="col-md-4 col-form-label text-md-right">
            {{ __('Description') }}
        </label>

        <div class="col-md-6">
            <textarea id="description"
                      class="form-control @error('description') is-invalid @enderror"
                      name="description"
                      autofocus
                      value=""
                      >@if(isset($task)){{$task->description}}@else{{old('description')}}@endif</textarea>

            @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="end_time"
               class="col-md-4 col-form-label text-md-right">
            {{ __('End Time') }}
        </label>

        <div class="col-md-6">
            <input id="end_time"
                   type="datetime-local"
                   class="form-control @error('end_time') is-invalid @enderror"
                   name="end_time"
                   value="@if(isset($task)){{date('Y-m-d\TH:i', strtotime($task->end_time))}}@else{{ old('name') }}@endif"
            />

            @error('end_time')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                @if(isset($task)){{ __('Edit Task') }}@else{{ __('Create Task') }}@endif
            </button>
        </div>
    </div>
</form>

