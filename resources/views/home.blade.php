@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(count($tasks) <= 0)
                        You don't have any task created yet!!
                        Maybe, <a href="">Create</a> one?
                    @else
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
