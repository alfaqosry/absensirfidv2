@extends('errors::minimal')

@section('title', __('Server Error'))
@section('code', '500')
@section('message')
<div class="text-center" style="padding-top: 200px">
    <div class="error mx-auto" data-text="500">500</div>
    <p class="lead text-gray-800 mb-5">Server Error</p>
    <p class="text-gray-500 mb-0">It looks like you found a glitch in the matrix...</p>
    <a href="{{route('dashboard')}}">&larr; Back to Dashboard</a>
</div>
@endsection
