@extends('layouts.admin')
@section('content')
<div class="p-3 pt-4">
    <a href="{{route('admin.projects.index')}}">
        <i class="fs-3 pb-3 fa-solid fa-circle-arrow-left"></i>
    </a>
    @include('partials.message')
    <div>
        <a class="me-3" href="{{ route('admin.projects.edit', $project->slug) }}">Modifica</a>
        <button type="button" class="btn btn-link p-0 pb-1" data-bs-toggle="modal" data-bs-target="#deleteModal">
            Elimina
        </button>
        <h2>{{ $project->id }}. {{ $project->name }}</h2> 
    </div>
    <h6>({{ $project->slug }})</h6>
    <small>{{ substr($project->created_at, 0, -9)}}</small>
    <p>{{ $project->description }}</p>
    @if ($project->image)
        <img class="w-25" src="{{ asset('storage/'.$project->image) }}" alt="...">
    @endif
</div>
@include('partials.modal')
@endsection
