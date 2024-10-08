@extends('layouts.app')

@section('title','New Project')

@section('content')

<main>
  <section>
    <div class="container">
      <h2 class="fs-2">Nuovo Progetto</h2>
    </div>
    <div class="container">
      <form action="{{ route('admin.projects.store') }}" method="POST"
      enctype="multipart/form-data">

        @csrf 

        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" name="title" class="form-control" id="title" placeholder="Title" value="{{ old('title') }}">
        </div>

        <div class="mb-3">
          <label for="type_id" class="form-label">Tipologia</label>
          <select class="form-control" name="type_id" id="type_id">
            <option value="">-- Seleziona Tipologia --</option>
            @foreach($types as $type) 
              <option @selected( $type->id == old('type_id') ) value="{{ $type->id }}"> {{ $type->name }}</option>
            @endforeach
          </select>
        </div>
        
        <div class="mb-3">
          <label for="description" class="form-label">Description</label>
          <textarea name="description" class="form-control" id="description" rows="3" placeholder="...">{{ old('description') }}</textarea>
        </div>

        <div class="mb-3">
          <label for="repository_link" class="form-label">Link GitHub</label>
          <input type="text" name="repository_link" class="form-control" id="repository_link" placeholder="..." value="{{ old('repository_link') }}">
        </div>

        <div class="mb-3">
          <label for="languages" class="form-label">Linguaggi</label>
          <input type="text" name="languages" class="form-control" id="languages" placeholder="..." value="{{ old('languages') }}">
        </div>

        <div class="mb-3">
          <label for="softwares" class="form-label">Softwares</label>
          <input type="text" name="softwares" class="form-control" id="softwares" placeholder="..." value="{{ old('softwares') }}">
        </div>

        <div class="mb-3">
          <label for="authors" class="form-label">Autori</label>
          <input type="text" name="authors" class="form-control" id="authors" placeholder="..." value="{{ old('authors') }}">
        </div>

        <div class="mb-3">
          <label for="img" class="form-label">Carica un'immagine</label>
          <input type="file" name="img" class="form-control" id="img">
        </div>

        <label for="technologies" class="form-label">Tecnologie utilizzate</label>
        <div class="d-flex gap-2 mb-3">

          @foreach($technologies as $technology) 

              <div class="form-check" id="technologies">
                <input @checked( in_array($technology->id, old('technologies',[])) )
                 name="technologies[]" class="form-check-input" type="checkbox" value="{{ $technology->id }}" id="technology-{{$technology->id}}">
                <label class="form-check-label" for="tag-{{$technology->id}}">
                  {{ $technology->name }}
                </label>
              </div>
                
            @endforeach
        </div>

        <button class="btn btn-primary">Aggiungi Progetto</button>
      </form>
    </div>
    <div class="container">
      @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
    </div>
  </section>
</main>

@endsection