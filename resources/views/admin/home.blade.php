@extends('layouts.app')

@section('app_style', 'user')

@section('content')
<div class="container">
  <a href=" {{route('admin.user.create')}} " class="btn btn-primary">Aggiungi nuovo piatto</a>
  
  <div class="row" style="margin-top: 20px;">

    @foreach($dishes as $dish)
    <div class="card" style="width: 15rem; padding: 20px; text-align: center;">
      <img src="{{ asset('storage/' . $dish->img_path) }}" class="card-img-top" alt="Dish Cover" style="width: 10rem; height: 7rem; margin-left: auto; margin-right: auto;">
      <div class="card-body">
        <h5 class="card-title" style="font-size: 15px">{{$dish->name}}</h5>
        <p class="card-text" style="font-size: 15px">{{$dish->description}}</p>
        <h5 class="card-title" style="font-size: 15px">{{$dish->price}}</h5>
        <div style="display: flex; justify-content: center; margin-top: 10px;">
          <a href="{{ route('admin.user.edit', [ 'user' => $dish->id ])}}" class="btn btn-success" style="margin-right: 5px;">Modifica</a>
          <a href="{{ route('admin.user.show', [ 'user' => $dish->id ])}}" class="btn btn-primary" style="margin-left: 5px;">Dettagli</a>
        </div>
      </div>
    </div>
    @endforeach

@endsection