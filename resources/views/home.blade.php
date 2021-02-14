@extends('layouts.master')

@section('content')
    <div class="section-header">
        <h1>Blank Page</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">{{ __('Dashboard') }}</a></div>
            <div class="breadcrumb-item"><a href="#">Bootstrap Components</a></div>
            <div class="breadcrumb-item">Alert</div>
        </div>
    </div>
    <div class="section-body">
        {{ __('You are logged in!') }}

    </div>
@endsection
