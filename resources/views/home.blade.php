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
                    <a href="/list-entries"><button class="btn btn-secondary">Entries</button></a>

                    <a href="/list-categories"><button class="btn btn-secondary">Categories</button></a>

                    <a href="/list-entriestypes"><button class="btn btn-secondary">Entries Types</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection