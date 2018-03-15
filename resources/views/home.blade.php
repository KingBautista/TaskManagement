@extends('layouts.app')

@section('content')

<div class="title m-b-md">
    Task Management
</div>

<div class="links">

	@if (Auth::user()->role === 1)
    <a href="/users">Users</a>
	@endif 
    <a href="/tasks">Tasks</a>

</div>

@endsection
