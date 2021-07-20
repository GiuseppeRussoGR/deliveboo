@extends('layouts.app')
@section('app_style', 'user')
@section('content')
    <div class="container" style="text-align: center;">
        <img src="{{ asset('storage/' . $dish->img_path) }}" alt="{{ $dish->name}}" style="width: 600px; height: 420px; margin-top: 25px;">

        <h2>{{ $dish->name}}</h2>

        <p>
            {{ $dish->description}}
        </p>

        <p>
            Prezzo: {{ $dish->price}}€
        </p>

        <form action="{{ route('admin.user.destroy', ['user' => $dish->id]) }}" method="post">
            @csrf
            @method('DELETE')
            <input type="submit" class="btn btn-danger" value="Elimina">
        </form>
    </div>
@endsection