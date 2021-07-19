@extends('layouts.app')

@section('app_style', 'user')

@section('content')
<div class="container">
  <a href=" {{route('admin.user.create')}} " class="btn btn-primary">Aggiungi nuovo piatto</a>
  
  <div class="row">

    @foreach($dishes as $dish)
    <div class="card" style="width: 18rem;">
      <img src="{{ asset('storage/' . $dish->img_path) }}" class="card-img-top" alt="Dish Cover">
      <div class="card-body">
        <h5 class="card-title">{{$dish->name}}</h5>
        <p class="card-text">{{$dish->description}}</p>
        <h5 class="card-title">{{$dish->price}}</h5>
        <a href="{{ route('admin.user.edit', [ 'user' => $dish->id ])}}" class="btn btn-success">Modifica</a>
        <a href="{{ route('admin.user.show', [ 'user' => $dish->id ])}}" class="btn btn-primary">Dettagli</a>
      </div>
    </div>
    @endforeach

  </div>

    <ul>
   
    <li>
      <ul>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
      </ul>
    </li>
    
    </ul>
</div>

@endsection