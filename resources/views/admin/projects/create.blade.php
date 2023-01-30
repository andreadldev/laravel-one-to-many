@extends('layouts.admin')
@section('content')
<div class="p-3 pt-4">
    <a href="{{route('admin.projects.index')}}">
            <i class="fs-3 pb-3 fa-solid fa-circle-arrow-left"></i>
    </a>
    <h2>Crea nuovo progetto</h2>
    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Inserisci il titolo" value="{{ old('title') }}">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea class="form-control" id="description" name="description" rows="10" placeholder="Inserisci il contenuto">{{ old('description') }}</textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Immagine</label>
            <input type="file" class="form-control" id="image" name="image" placeholder="Carica immagine" value="{{ old('image') }}">
        </div>
        <button type="submit" class="btn btn-primary">Crea</button>
    </form>
</div>
@endsection
