@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="float-lefft" >{{ __('All Tasks') }}</h4>
                    <h4 class="float-right" > <a href=" {{ route('task.create') }} "> + </a> </h4>
                </div>

                <div class="card-body">
                        
                    @include('includes.tasks.list')

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
