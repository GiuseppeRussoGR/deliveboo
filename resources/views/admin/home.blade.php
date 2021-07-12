@extends('layouts.app')
@section('content')
<ul>
@foreach($dishes as $dish)
<li>{{$dish->name}}
  <ul>
    <li>{{$dish->description}}</li>
    <li>{{$dish->price}}</li>
  </ul>
</li>
@endforeach
</ul>
@endsection