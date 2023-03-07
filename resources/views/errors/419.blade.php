@extends('errors::minimal')

@section('title', __('Page Expired'))
@section('code', '419')
@section('message')
<div class="text-center" style="padding-top: 200px">
    <div class="error mx-auto" data-text="419">419</div>
    <p class="lead text-gray-800 mb-5">Page Expired</p>
    <p class="text-gray-500 mb-0">It looks like you found a glitch in the matrix...</p>
    <a href="{{route('dashboard')}}">&larr; Back to Dashboard</a>
</div>
@endsection
