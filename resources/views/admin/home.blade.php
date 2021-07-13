@extends('layouts.app')
@section('content')
<ul>
@foreach($dishes as $dish)
<li>{{$dish->name}}
  <ul>
    <li><img src="{{ asset('storage/' . $dish->img_path) }}" alt="Dish Cover"></li>
    <li>{{$dish->description}}</li>
    <li>{{$dish->price}}</li>
  </ul>
</li>
@endforeach
</ul>
@endsection