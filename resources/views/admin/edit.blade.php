@extends('layouts.app')
@section('content')

<div class="container">
    <h1>Aggiungi un piatto</h1>

    <form action=" {{ route('admin.user.update', [ 'user' => $dish->id ]) }} " method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nome Piatto</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $dish->name) }}">
        </div>

        <div class="form-group">
            <label for="description">Descrizione</label>
            <input type="text" class="form-control" id="description" name="description" value="{{ old('description', $dish->description) }}">
        </div>
        
        <div class="form-group">
            <label for="price">Prezzo</label>
            <input type="number" step=".01" class="form-control" id="price" name="price" value="{{ old('price', $dish->price) }}">
        </div>

        <div class="form-group">
            <p>Visibilità</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" id="visible" name="visibility" value="1"
                {{ old('visibility', $dish->visibility) == 1 ? 'checked' : '' }}>
                <label for="visible" class="form-check-label">Si</label>
            </div>

            <div class="form-check">
                <input type="radio" class="form-check-input" id="not-visible" name="visibility" value="0"
                {{ old('visibility', $dish->visibility) == 0 ? 'checked' : '' }}>
                <label for="not-visible" class="form-check-label">No</label>
            </div>
        </div>

        <div class="form-group">
            <label for="category">Indica la tipologia del piatto</label>
                <select class="form-control" name="category_id">
                    <option value="">Scegli</option>
                        @foreach ($categories as $category)
                            <!-- il ternario fa in modo che la option rimanga selezionata in caso non vada a buon fine la creazione del nuovo post -->
                            <option value="{{ $category->id }}" {{ (old('category', $dish->category_id) == $category->id) ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                </select>
        </div>

        <div class="form-group">
            <div>
                <img src="{{ asset('storage/' . $dish->img_path) }}" alt="{{ $dish->name }}">
                <label for="img_path">Inserisci un'immagine di copertina</label>
                <input type="file" class="form-control-file" id="img_path" name="img_path">
            </div>
        </div>

        <button type="submit" class="btn btn-primary my-4">Salva</button>
    </form>
</div>

@endsection