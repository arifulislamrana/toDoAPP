@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Recent tasks') }}</div>

                <div class="card-body" style="background: {{ $settings['dashboard_color'] }}">
                    
                        @include('includes.tasks.list')

                        <br>
                        <a href="{{ route('task.all') }}">show all</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
