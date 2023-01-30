@extends('layouts.admin')
@section('content')
<div class="p-3 pt-4">
    <a href="{{ route('admin.projects.show', $project->slug) }}">
        <i class="fs-3 pb-3 fa-solid fa-circle-arrow-left"></i>
    </a>
    <h1>EDIT</h1>
    <div class="mt-4">
        <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Inserisci il nome" value="{{ old('name', $project->name) }}">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea class="form-control" id="description" name="description" rows="10" placeholder="Inserisci la descrizione">{{ old('description', $project->description) }}</textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Immagine</label>
                <input type="file" class="form-control" id="image" name="image" placeholder="Carica immagine" value="{{ old('image') }}">
            </div>
            <button type="submit" class="btn btn-primary">Modifica</button>
        </form>
    </div>
</div>
@endsection
