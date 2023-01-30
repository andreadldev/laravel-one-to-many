@extends('layouts.admin')
@section('content')

@include('partials.message')
<div class="p-3 pt-4">
    <h1>Lista progetti</h1>
</div>

<a class="btn btn-primary mb-3" href="{{ route('admin.projects.create') }}">Aggiungi</a>

<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Nome</th>
            <th scope="col">Slug</th>
            <th scope="col">Descrizione</th>
            <th scope="col">Data di creazione</th>
        </tr>
    </thead>
  <tbody>
    @foreach ($projects as $project)
    <tr style="cursor:pointer;" onclick="window.location='{{ route('admin.projects.show', $project->slug) }}'">
        <th scope="row">{{ $project->id }}</th>
        <td>{{ $project->name }}</td>
        <td>{{ $project->slug }}</td>
        <td>{{ $project->description }}</td>
        <td>{{ substr($project->created_at, 0, -9)}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
